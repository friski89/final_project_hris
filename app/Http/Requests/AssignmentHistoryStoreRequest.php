<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentHistoryStoreRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
