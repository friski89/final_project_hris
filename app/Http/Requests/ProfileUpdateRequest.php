<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'gender' => ['required', 'in:male,female,other'],
            'phone_number' => [
                'nullable',
                Rule::unique('profiles', 'phone_number')->ignore(
                    $this->profile
                ),
                'max:20',
                'string',
            ],
            'blood_group' => ['nullable', 'in:tidak tahu,o,a,b,ab'],
            'no_ktp' => [
                'nullable',
                Rule::unique('profiles', 'no_ktp')->ignore($this->profile),
                'max:30',
                'string',
            ],
            'no_npwp' => [
                'nullable',
                Rule::unique('profiles', 'no_npwp')->ignore($this->profile),
                'max:30',
                'string',
            ],
            'address_ktp' => ['nullable', 'max:255', 'string'],
            'address_domisili' => ['nullable', 'max:255', 'string'],
            'status_domisili' => [
                'nullable',
                'in:rumah sendiri,rumah sewa,rumah keluarga',
            ],
            'user_id' => ['required', 'exists:users,id'],
            'religion_id' => ['required', 'exists:religions,id'],
            'address_npwp' => ['required', 'max:255', 'string'],
            'nama_ibu' => ['required', 'max:255', 'string'],
        ];
    }
}
