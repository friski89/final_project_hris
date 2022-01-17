<?php

namespace App\Imports;

use App\Models\Family;
use App\Models\User;
use App\Models\Profile;
use App\Models\Religion;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FamilyImport implements  ToModel, WithHeadingRow, WithValidation
{
    use Importable, SkipsErrors;
    private $rows = 0;
    public function model(array $row)
    {
        
        // return new Family([
        //     //
        // ]);
        // dd($row['no_ktp']);
        $user = User::where('username',$row['parent_id'])->first();
        $religion = "";
        if($user !== null) {
            $profile = Profile::where('user_id', $user->id)->first();
            if($profile == null) {
                $nameReligion = "Islam";
            } else {
                $religion = Religion::where('id', $profile->religion_id)->first();
                if($religion === null) {
                    $nameReligion = "Islam";
                } else {
                    if(strtoupper($religion->name) == "PROTESTAN") {
                        $nameReligion = "Kristen";
                    } else if(strtoupper($religion->name) == "KATOLIK") {
                        $nameReligion = "Kristen";
                    } else {
                        $nameReligion = ucfirst(strtolower($religion->name));
                    }
                }
            }
            
            
            
        } else {
            return;
        }
       

        // dd($nameReligion);
       
        // dd($user->name);
        if($row['sex'] == "M") {
            $gender = "male";
        } else if($row['sex'] == "F") {
            $gender = "female";
        }

        if (strpos($row['phone'], '/') !== false) {
            $phoneNumbers = explode('/',$row['phone']);
            $phoneNumber = $phoneNumbers[0];
        } else {
            $phoneNumber = $row['phone'];
        }

        if(strpos($phoneNumber, '-') !== false){
            $phoneNumber = str_replace('-', '', $phoneNumber);
        }

        if($row['sex'] == "F" && $row['fam_status'] == "EMPLOYEE") {
            $relationship = "Istri";
            $urutan = 2;
            $dependent_status = 1;
        } else if($row['sex'] == "M" && $row['fam_status'] == "EMPLOYEE") {
            $relationship = "Suami";
            $urutan = 1;
            $dependent_status = 1;
        }

        if($row['fam_status'] == "SPOUSE") {
            $relationship = "Istri";
            $urutan = 2;
            $dependent_status = 0;
        }

        if($row['fam_status'] == "CHILD") {
            $relationship = "Anak";
            $urutan = 3;
            $dependent_status = 0;
        }

        if($user !== null) {
            ++$this->rows;
            $arrayInsert = [
                'employee_name' => $user->name,
                'emp_no' => $user->username,
                'marital_status' => $row['st_kwn'] == "Y" ? "Menikah" : "Belum Menikah",
                'nik_id' => $row['no_ktp'],//$this->getRowCount(),
                'no_kk' => '-',
                'family_name' => $row['member_name'],
                'place_of_birth' => '-',
                'date_of_birth' => Date::excelToDateTimeObject($row['birth_date']),
                'gender' => $gender,
                'date_marital' => null,
                'citizenship' =>  '',
                'work' => null,
                'health_status' => 1,
                'blood_rhesus' => '-',
                'blood_group' => 'Tidak Tahu',
                'house_number' => '',
                'handphone_number' => $phoneNumber,
                'emergency_number' => '',
                'address' => $row['address'] == "" ? '-' : $row['address'],
                'religion' => $nameReligion,
                'city' => '',
                'province' => '',
                'postal_code' => '',
                'relationship' => $relationship,
                'alive' => 1,
                'urutan' => $urutan,
                'dependent_status' => $dependent_status,
                'user_id' => $user->id,
                'vaccine1' => false,
                'vaccine2' => false,
                'not_vaccine' => false,
                'remarks_not_vaccine' => '-',
                
            ];
            Family::create($arrayInsert);
        }
        

        
    }

    public function rules() : array {
        return [
            '*.employee_name' => ['nullable', 'max:255', 'string'],
            '*.emp_no' => ['nullable', 'max:255', 'string'],
            '*.marital_status' => [
                'nullable',
                'in:Menikah,Belum Menikah,Duda,Janda',
            ],
            // '*.no_kk' => ['nullable', 'max:255', 'string'],
            '*.family_name' => ['nullable', 'max:255', 'string'],
            '*.place_of_birth' => ['max:255', 'string'],
            // '*.date_of_birth' => ['date'],
            '*.date_of_birth' => ['date_of_birth' => 'nullable'],
            '*.gender' => ['nullable', 'in:male,female,other'],
            '*.date_marital' => ['nullable', 'date'],
            'religion' => ['nullable'],
            '*.citizenship' => ['max:255', 'string'],
            '*.work' => ['nullable', 'max:255', 'string'],
            '*.health_status' => ['numeric'],
            // 'blood_group' => ['required', 'in:Tidak Tahu,O,A,B,AB'],
            '*.blood_rhesus' => ['nullable', 'max:255', 'string'],
            '*.house_number' => ['nullable', 'max:255', 'string'],
            '*.handphone_number' => ['nullable', 'max:255', 'string'],
            '*.emergency_number' => ['nullable', 'max:255', 'string'],
            '*.address' => ['nullable', 'max:255', 'string'],
            '*.city' => ['max:255', 'string'],
            '*.province' => ['max:255', 'string'],
            '*.postal_code' => ['max:255', 'string'],
            '*.relationship' => ['in:Suami,Istri,Anak'],
            '*.alive' => ['numeric'],
            '*.urutan' => ['numeric'],
            '*.dependent_status' => ['numeric'],
            '*.user_id' => ['nullable', 'exists:users,id'],
            // '*.edu_id' => ['required', 'exists:edus,id'],
            '*.vaccine1' => [
                'nullable',
            ],
            '*.vaccine2' => [
                'nullable',
            ],
            '*.not_vaccine' => [
                'nullable',
            ],
            '*.remarks_not_vaccine' => ['nullable', 'max:255', 'string'],
        ];
        // return [];
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
