<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementHistoryStoreRequest extends FormRequest
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
            'award_name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'institution' => ['required', 'max:255', 'string'],
            'no_sk' => ['required', 'max:255', 'string'],
            'office_name' => ['required', 'max:255', 'string'],
            'position_name' => ['required', 'max:255', 'string'],
            'remarks' => ['nullable', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
