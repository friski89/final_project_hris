<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceHistoryUpdateRequest extends FormRequest
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
            'emoloyee_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'type' => ['required', 'max:255', 'string'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'company_host_id' => ['required', 'exists:company_hosts,id'],
            'band_position_id' => ['required', 'exists:band_positions,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
