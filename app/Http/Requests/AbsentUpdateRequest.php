<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsentUpdateRequest extends FormRequest
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
            'user_id' =>  ['required', 'max:255', 'string'],
            'nik' =>  ['required', 'max:255', 'string'],
            'date_in' => ['nullable', 'date'],
            'date_out' => ['required', 'date'],
            'meta' => ['nullable', 'array'],
        ];
    }
}
