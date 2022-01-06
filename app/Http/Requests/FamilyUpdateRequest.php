<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FamilyUpdateRequest extends FormRequest
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
            'employee_name' => ['required', 'max:255', 'string'],
            'emp_no' => ['required', 'max:255', 'string'],
            'marital_status' => [
                'nullable',
                'in:Menikah,Belum Menikah,Duda,Janda',
            ],
            'no_kk' => ['required', 'max:255', 'string'],
            'family_name' => ['required', 'max:255', 'string'],
            'nik_id' => [
                'required',
                // Rule::unique('families', 'nik_id')->ignore($this->family),
                'unique:families,nik_id,' . $this->id,
                'max:255',
                'string',
            ],
            'place_of_birth' => ['required', 'max:255', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female,other'],
            'date_marital' => ['nullable', 'date'],
            'religion' => ['required', 'in:Islam,Kristen,Hindu,Budha,Konghucu'],
            'citizenship' => ['required', 'max:255', 'string'],
            'work' => ['nullable', 'max:255', 'string'],
            'health_status' => ['required', 'numeric'],
            'blood_group' => ['required', 'in:Tidak Tahu,O,A,B,AB'],
            'blood_rhesus' => ['nullable', 'max:255', 'string'],
            'house_number' => ['nullable', 'max:255', 'string'],
            'handphone_number' => ['nullable', 'max:255', 'string'],
            'emergency_number' => ['nullable', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'province' => ['required', 'max:255', 'string'],
            'postal_code' => ['required', 'max:255', 'string'],
            'relationship' => ['required', 'in:Suami,Istri,Anak'],
            'alive' => ['required', 'numeric'],
            'urutan' => ['required', 'numeric'],
            'dependent_status' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
            'edu_id' => ['required', 'exists:edus,id'],
            'vaccine1' => [
                'nullable',
            ],
            'vaccine2' => [
                'nullable',
            ],
            'not_vaccine' => [
                'nullable',
            ],
            'remarks_not_vaccine' => ['nullable', 'max:255', 'string'],
        ];
    }
}
