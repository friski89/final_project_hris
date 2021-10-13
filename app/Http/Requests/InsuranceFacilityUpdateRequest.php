<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceFacilityUpdateRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'jenis_asuransi' => ['required', 'max:255', 'string'],
            'provider_asuransi' => ['required', 'max:255', 'string'],
            'nama_peserta' => ['required', 'max:255', 'string'],
            'status_peserta' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'peserta_manfaat' => ['required', 'max:255', 'string'],
        ];
    }
}
