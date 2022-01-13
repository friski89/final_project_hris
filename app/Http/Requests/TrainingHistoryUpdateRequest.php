<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingHistoryUpdateRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         'emp_no' => ['required', 'max:255', 'string'],
    //         'employee_name' => ['required', 'max:255', 'string'],
    //         'training_name' => ['required', 'max:255', 'string'],
    //         'institution' => ['required', 'max:255', 'string'],
    //         'start_date' => ['required', 'date'],
    //         'years_of_training' => ['required', 'max:255', 'string'],
    //         'training_duration' => ['required', 'max:255', 'string'],
    //         'end_date' => ['required', 'date'],
    //         'training_force' => ['required', 'max:255', 'string'],
    //         'rating' => ['required', 'max:255', 'string'],
    //         'trnevent_topic' => ['required', 'max:255', 'string'],
    //         'trncourse_cost' => ['required', 'max:255', 'string'],
    //         'trnevent_type' => ['required', 'max:255', 'string'],
    //         'trn_flag' => ['required', 'max:255', 'string'],
    //         'user_id' => ['required', 'exists:users,id'],
    //         'other_competencies_id' => [
    //             'nullable',
    //             'exists:other_competencies,id',
    //         ],
    //         'competence_fanctional_id' => [
    //             'nullable',
    //             'exists:competence_fanctionals,id',
    //         ],
    //         'competence_leadership_id' => [
    //             'nullable',
    //             'exists:competence_leaderships,id',
    //         ],
    //         'competence_core_value_id' => [
    //             'nullable',
    //             'exists:competence_core_values,id',
    //         ],
    //     ];
    // }
    public function rules()
    {
        return [
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'training_name' => ['required', 'max:255', 'string'],
            'institution' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'years_of_training' => ['required', 'max:255', 'string'],
            'training_duration' => ['required', 'max:255', 'string'],
            'end_date' => ['required', 'date'],
            'training_force' => ['required', 'max:255', 'string'],
            'rating' => ['required', 'max:255', 'string'],
            'trnevent_topic' => ['required', 'max:255', 'string'],
            'trncourse_cost' => ['required', 'max:255', 'string'],
            'trnevent_type' => ['required', 'max:255', 'string'],
            'trn_flag' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
