<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataThpStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'base_salary' => ['required', 'max:255'],
            'tunjangan_jabatan' => ['required', 'max:255'],
            'tunjangan_fixed' => ['required', 'max:255'],
            'based_jamsostek' => ['required', 'max:255'],
            'no_jamsostek' => ['required', 'max:255', 'string'],
            'no_bpjs' => ['required', 'max:255', 'string'],
            'no_npwp' => ['required', 'max:255'],
            'status_pajak' => ['required', 'numeric'],
            'no_rekening' => ['required', 'max:255'],
            'nama_bank' => ['required', 'max:255', 'string'],
            'nama_pemilik' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
