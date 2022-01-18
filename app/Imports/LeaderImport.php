<?php

namespace App\Imports;

use App\Models\Leader;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class LeaderImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {

        return new Leader([
            'nik' => $row['nik'],
            'nik_atasan1' => $row['nik_atasan1'],
            'atasan1' => $row['atasan1'],
            'jabatan1' => $row['jabatan1'],
            'nik_atasan2' => $row['nik_atasan2'],
            'atasan2' => $row['atasan2'],
            'jabatan2' => $row['jabatan2'],
            'nik_atasan3' => $row['nik_atasan3'],
            'atasan3' => $row['atasan3'],
            'jabatan3' => $row['jabatan3'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nik' => ['nik' => 'required', 'unique:leaders,nik'],
            '*.nik_atasan1' => ['nik_atasan1' => 'nullable'],
            '*.atasan1' => ['atasan1' => 'nullable'],
            '*.jabatan1' => ['jabatan1' => 'nullable'],
            '*.nik_atasan2' => ['nik_atasan2' => 'nullable'],
            '*.atasan2' => ['atasan2' => 'nullable'],
            '*.jabatan2' => ['jabatan2' => 'nullable'],
            '*.nik_atasan3' => ['nik_atasan3' => 'nullable'],
            '*.atasan3' => ['atasan3' => 'nullable'],
            '*.jabatan3' => ['jabatan3' => 'nullable'],
        ];
    }

    public function headingRow(): int
    {
        return 1;
    }
}
