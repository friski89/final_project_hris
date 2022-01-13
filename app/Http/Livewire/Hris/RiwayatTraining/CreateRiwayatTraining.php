<?php

namespace App\Http\Livewire\Hris\RiwayatTraining;

use App\Models\User;
use Livewire\Component;
use App\Models\TrainingHistory;
use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;
use Illuminate\Support\Facades\Validator;

class CreateRiwayatTraining extends Component
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
            'other_competencies_id' => 'nullable|exists:other_competencies,id',
            'competence_fanctional_id' => 'nullable|exists:other_competencies,id',
            'competence_leadership_id' => 'nullable|exists:other_competencies,id',
            'competence_core_value_id' => 'nullable|exists:other_competencies,id'
        ])->validate();

        TrainingHistory::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('training-histories.index');
    }
    public function render()
    {
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');

        return view(
            'livewire.hris.riwayat-training.create-riwayat-training',
            compact(
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
    }
}
