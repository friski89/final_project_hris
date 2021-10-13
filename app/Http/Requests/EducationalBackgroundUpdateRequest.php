<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationalBackgroundUpdateRequest extends FormRequest
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
            'emp_no' => ['required', 'max:100', 'string'],
            'employee_name' => ['required', 'max:100', 'string'],
            'institution_name' => ['required', 'max:255', 'string'],
            'faculty' => ['required', 'max:255', 'string'],
            'major' => ['required', 'max:255', 'string'],
            'graduate_date' => ['required', 'date'],
            'cost_category' => ['required', 'max:255', 'string'],
            'scholarship_institution' => ['nullable', 'max:255', 'string'],
            'gpa' => ['required', 'max:255', 'string'],
            'gpa_scale' => ['required', 'max:255', 'string'],
            'default' => ['required', 'max:255', 'string'],
            'start_year' => ['required', 'date'],
            'city' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'edu_id' => ['required', 'exists:edus,id'],
        ];
    }
}
