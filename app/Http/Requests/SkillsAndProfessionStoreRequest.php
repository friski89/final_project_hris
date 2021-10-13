<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsAndProfessionStoreRequest extends FormRequest
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
            'certificate_name' => ['required', 'max:255', 'string'],
            'institution' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'other_competencies_id' => [
                'nullable',
                'exists:other_competencies,id',
            ],
            'competence_fanctional_id' => [
                'nullable',
                'exists:competence_fanctionals,id',
            ],
            'competence_leadership_id' => [
                'nullable',
                'exists:competence_leaderships,id',
            ],
            'competence_core_value_id' => [
                'nullable',
                'exists:competence_core_values,id',
            ],
        ];
    }
}
