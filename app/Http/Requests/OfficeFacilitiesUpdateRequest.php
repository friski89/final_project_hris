<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeFacilitiesUpdateRequest extends FormRequest
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
            'jenis_fasilitas' => ['required', 'max:255', 'string'],
            'jenis_pemberian' => ['required', 'max:255', 'string'],
            'nilai_perolehan' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
        ];
    }
}
