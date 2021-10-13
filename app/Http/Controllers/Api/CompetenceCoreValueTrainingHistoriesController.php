<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetenceCoreValue;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingHistoryResource;
use App\Http\Resources\TrainingHistoryCollection;

class CompetenceCoreValueTrainingHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('view', $competenceCoreValue);

        $search = $request->get('search', '');

        $trainingHistories = $competenceCoreValue
            ->trainingHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new TrainingHistoryCollection($trainingHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('create', TrainingHistory::class);

        $validated = $request->validate([
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
        ]);

        $trainingHistory = $competenceCoreValue
            ->trainingHistories()
            ->create($validated);

        return new TrainingHistoryResource($trainingHistory);
    }
}
