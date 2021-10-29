<?php

namespace App\Http\Livewire\Hris\RiwayatTraining;

use Livewire\Component;
use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;
use App\Models\TrainingHistory;
use Illuminate\Support\Facades\Validator;

class UpdateRiwayatTraining extends Component
{
    public $state = [];

    public $trainingHistory;

    public function mount(TrainingHistory $trainingHistory)
    {
        $this->state = $trainingHistory->toArray();
        $this->trainingHistory = $trainingHistory;
    }

    public function updateForm()
    {
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'employee_name' => 'required',
            'training_name' => 'required',
            'institution' => 'required',
            'start_date' => 'required',
            'years_of_training' => 'required',
            'training_duration' => 'required',
            'end_date' => 'required',
            'training_force' => 'required',
            'rating' => 'required',
            'trnevent_topic' => 'required',
            'trncourse_cost' => 'required',
            'trnevent_type' => 'required',
            'trn_flag' => 'required',
            'other_competencies_id' => 'required',
            'competence_fanctional_id' => 'required',
            'competence_leadership_id' => 'required',
            'competence_core_value_id' => 'required'
        ])->validate();

        $this->trainingHistory->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('training-histories.index');
    }

    public function render()
    {
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');
        return view(
            'livewire.hris.riwayat-training.update-riwayat-training',
            compact(
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
    }
}
