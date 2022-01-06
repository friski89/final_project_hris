<?php

namespace App\Http\Livewire\Hris\DataPenugasan;

use Livewire\Component;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\AssignmentHistory;
use Illuminate\Support\Facades\Validator;

class UpdateDataPenugasan extends Component
{
    public $state = [];

    public $assignmentHistory;

    public function mount(AssignmentHistory $assignmentHistory)
    {
        $this->state = $assignmentHistory->toArray();
        $this->assignmentHistory = $assignmentHistory;
    }

    public function updateForm()
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

        $this->assignmentHistory->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('assignment-histories.index');
    }

    public function render()
    {
        $companyHomes = CompanyHome::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        return view('livewire.hris.data-penugasan.update-data-penugasan', compact(
            'companyHomes',
            'jobTitles'
        ));
    }
}
