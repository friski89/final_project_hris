<?php

namespace App\Http\Livewire\Hris\PenilaianKinerja;

use App\Models\PerformanceAppraisalHistory;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreatePenilaianKinerja extends Component
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
    }

    public function createForm()
    {
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'employee_name' => 'required',
            'year' => 'required',
            'performance_value' => 'required',
            'performance_score' => 'required',
            'competency_value' => 'required',
            'behavioral_value' => 'required',
        ])->validate();

        PerformanceAppraisalHistory::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('performance-appraisal-histories.index');
    }

    public function render()
    {
        return view('livewire.hris.penilaian-kinerja.create-penilaian-kinerja');
    }
}
