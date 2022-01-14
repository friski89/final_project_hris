<?php

namespace App\Imports;

use App\Models\Profile;
use App\Models\User;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportProfileUser implements ToModel, WithHeadingRow, WithValidation
{
   
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        // dd($row->nik_admedika);
        $user = User::where('username',$row['nik_admedika'])->first();
        $religion = Religion::whereRaw('UPPER(name) = ?',[strtoupper($row['religion'])])->first();
        // dd($religion->id);
        // dd($row);
        if($user !== null) {
            $profile = Profile::where('user_id', $user->id)->update([
                'gender' => strtolower($row['gender']) == 'perempuan' ? 'female' : strtolower($row['gender']) == 'laki-laki' ? 'male' : "",
                'phone_number' => $row['phone_number'],
                'blood_group' => $row['blood_type'],
                'no_ktp' => $row['ktp_number'],
                'no_npwp' => $row['npwp_number'],
                'status_domisili' => $row['status_domisili'],
                'address_ktp' => $row['ktp_addres'],
                'address_domisili' => $row['domisili_addres'],
                'address_npwp' => $row['npwp_addres'],
                'nama_ibu' => $row['mother_name'],
                'religion_id' => $religion->id,
                'vaccine1' => 0,
                'vaccine2' => 0,
                'not_vaccine' => 0,
                'remarks_not_vaccine' => '',
            ]);
        }
        

        // dd($profile);
        // $user->assignRole(3);

        // return new Profile([
        //    ''
        // ]);
    }

    public function rules(): array
    {
        return [
            '*.gender' => ['nullable'],
            '*.phone_number' => [
                'nullable',
            ],
            '*.blood_group' => ['nullable'],
            '*.no_ktp' => [
                'nullable',
            ],
            '*.no_npwp' => [
                'nullable',
            ],
            '*.status_domisili' => [
                'nullable',
            ],
            '*.address_ktp' => ['nulleable', 'max:255', 'string'],
            '*.address_domisili' => ['nullable', 'max:255', 'string'],
            '*.address_npwp' => ['nullable', 'max:255', 'string'],
            '*.user_id' => ['nullable', 'exists:users,id'],
            '*.nama_ibu' => ['nullable', 'max:255', 'string'],
            '*.religion_id' => ['nullable', 'exists:religions,id'],
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
}
