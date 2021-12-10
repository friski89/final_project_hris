<?php

namespace App\Imports;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeeImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        // dd(Date::excelToDateTimeObject($row['date_in']));
        $user = User::create([
            'name' => $row['name'],
            'username' => $row['nik_company'],
            'email' => $row['email'],
            'password' => Hash::make('admedika321'),
            'nik_telkom' => $row['nik_telkom'],
            'nik_company' => $row['nik_company'],
            'date_in' => Date::excelToDateTimeObject($row['date_in']),
            'band_position_id' => $row['band_position_id'],
            'job_grade_id' => $row['job_grade_id'],
            'job_family_id' => $row['job_family_id'],
            'job_function_id' => $row['job_function_id'],
            'city_recuite_id' => $row['city_recuite_id'],
            'status_employee_id' => $row['status_employee_id'],
            'company_home_id' => $row['company_home_id'],
            'date_sk' => Date::excelToDateTimeObject($row['date_sk']),
            'company_host_id' => $row['company_host_id'],
            'sub_status_id' => $row['sub_status_id'],
            'unit_id' => $row['unit_id'],
            'place_of_birth' => $row['place_of_birth'],
            'division_id' => $row['division_id'],
            'date_of_birth' => Date::excelToDateTimeObject($row['date_of_birth']),
            'work_location_id' => $row['work_location_id'],
            'age' => $row['age'],
            'job_title_id' => $row['job_title_id'],
            'edu_id' => $row['edu_id'],
            'direktorat_id' => $row['direktorat_id'],
            'departement_id' => $row['departement_id'],
            'tanggal_kartap' => Date::excelToDateTimeObject($row['tanggal_kartap']),
            'no_sk_kartap' => $row['no_sk_kartap'],
            'jabatan' => $row['jabatan'],
            'end_date' => Date::excelToDateTimeObject($row['end_date'])
        ]);

        $user->assignRole(3);

        return new Profile([
            'user_id' => $user->id,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name' => ['name' => 'required'],
            '*.company_home_id' => ['company_home_id' => 'required', 'numeric'],
            '*.company_host_id' => ['company_host_id' => 'required', 'numeric'],
            '*.nik_telkom' => ['nik_telkom' => 'nullable', 'unique:users,nik_telkom'],
            '*.nik_company' => ['nik_company' => 'required', 'unique:users,nik_company'],
            '*.date_in' => ['date_in' => 'nullable'],
            '*.status_employee_id' => ['status_employee_id' => 'required', 'numeric'],
            '*.band_position_id' => ['band_position_id' => 'required', 'numeric'],
            '*.job_grade_id' => ['job_grade_id' => 'nullable', 'numeric'],
            '*.job_family_id' => ['job_family_id' => 'nullable', 'numeric'],
            '*.job_function_id' => ['job_function_id' => 'nullable', 'numeric'],
            '*.work_location_id' => ['work_location_id' => 'required', 'numeric'],
            '*.job_title_id' => ['job_title_id' => 'required', 'numeric'],
            '*.date_sk' => ['date_sk' => 'nullable'],
            '*.division_id' => ['division_id' => 'required', 'numeric'],
            '*.sub_status_id' => ['sub_status_id' => 'required', 'numeric'],
            '*.unit_id' => ['unit_id' => 'required', 'numeric'],
            '*.edu_id' => ['edu_id' => 'required', 'numeric'],
            '*.place_of_birth' => ['place_of_birth' => 'nullable'],
            '*.date_of_birth' => ['date_of_birth' => 'required'],
            '*.age' => ['age' => 'required'],
            '*.email' => ['email' => 'nullable', 'unique:users,email'],
            '*.city_recuite_id' => ['city_recuite_id' => 'required'],
            '*.direktorat_id' => ['direktorat_id' => 'required', 'numeric'],
            '*.departement_id' => ['departement_id' => 'required', 'numeric'],
            '*.tanggal_kartap' => ['tanggal_kartap' => 'nullable', 'numeric'],
            '*.no_sk_kartap' => ['no_sk_kartap' => 'nullable', 'numeric'],
            '*.jabatan' => ['jabatan' => 'nullable'],
            '*.end_date' => ['end_date' => 'nullable'],
        ];
    }

    public function headingRow(): int
    {
        return 1;
    }
}
