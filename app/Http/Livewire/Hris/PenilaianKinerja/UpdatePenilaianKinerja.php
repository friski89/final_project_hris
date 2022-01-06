<?php

namespace App\Http\Livewire\Hris\PenilaianKinerja;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\PerformanceAppraisalHistory;

class UpdatePenilaianKinerja extends Component
{
    public $state = [];

    public $performanceAppraisalHistory;

    public function mount(PerformanceAppraisalHistory $performanceAppraisalHistory)
    {
        $this->state = $performanceAppraisalHistory->toArray();
        $this->performanceAppraisalHistory = $performanceAppraisalHistory;
    }

    public function updateForm()
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

        $this->performanceAppraisalHistory->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('performance-appraisal-histories.index');
    }

    public function render()
    {
        return view('livewire.hris.penilaian-kinerja.update-penilaian-kinerja');
    }
}
