<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MyProfileUpdateRequest extends FormRequest
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
        $profile = Auth::user()->profile;

        return [
            'gender' => ['required', 'in:male,female,other'],
            'phone_number' => [
                'nullable',
                Rule::unique('profiles', 'phone_number')->ignore(
                    $profile
                ),
                'max:20',
                'string',
            ],
            'blood_group' => ['nullable', 'in:Tidak Tahu,O,A,B,AB'],
            'no_ktp' => [
                'nullable',
                Rule::unique('profiles', 'no_ktp')->ignore($profile),
                'max:30',
                'string',
            ],
            'no_npwp' => [
                'nullable',
                Rule::unique('profiles', 'no_npwp')->ignore($profile),
                'max:30',
                'string',
            ],
            'status_domisili' => [
                'nullable',
                'in:Rumah Sendiri,Rumah Sewa,Rumah Keluarga',
            ],
            'address_ktp' => ['required', 'max:255', 'string'],
            'address_domisili' => ['required', 'max:255', 'string'],
            'address_npwp' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'nama_ibu' => ['required', 'max:255', 'string'],
            'religion_id' => ['required', 'exists:religions,id'],
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
