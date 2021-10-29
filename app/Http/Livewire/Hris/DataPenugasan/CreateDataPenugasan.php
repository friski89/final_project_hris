<?php

namespace App\Http\Livewire\Hris\DataPenugasan;

use App\Models\AssignmentHistory;
use App\Models\User;
use Livewire\Component;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use Illuminate\Support\Facades\Validator;

class CreateDataPenugasan extends Component
{
    public $state = [];
    public $emp_no;

    public function searchEmploye()
    {
        Validator::make($this->state, [
            'emp_no' => 'required'
        ])->validate();

        $nik = $this->state['emp_no'];

        $data = User::where('nik_company', $nik)->firstOrFail();
        $this->state['user_id'] = $data->id;
        $this->state['employee_name'] = $data->name;
        $this->state['company_home_id'] = $data->company_home_id;
        $this->state['job_title_id'] = $data->job_title_id;
    }

    public function createForm()
    {
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'employee_name' => 'required',
            'date' => 'required',
            'company_home_id' => 'required',
            'job_title_id' => 'required',
            'assignment_name' => 'required',
        ])->validate();
        AssignmentHistory::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('assignment-histories.index');
    }

    public function render()
    {
        $companyHomes = CompanyHome::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');

        return view('livewire.hris.data-penugasan.create-data-penugasan', compact(
            'companyHomes',
            'jobTitles'
        ));
    }
}
