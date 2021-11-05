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
            'blood_group' => ['nullable', 'in:tidak tahu,o,a,b,ab'],
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
                'in:rumah sendiri,rumah sewa,rumah keluarga',
            ],
            'address_ktp' => ['required', 'max:255', 'string'],
            'address_domisili' => ['required', 'max:255', 'string'],
            'address_npwp' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'nama_ibu' => ['required', 'max:255', 'string'],
            'religion_id' => ['required', 'exists:religions,id'],
        ];
    }
}
