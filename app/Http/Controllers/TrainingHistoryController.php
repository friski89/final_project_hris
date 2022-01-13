<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TrainingHistory;
use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;
use App\Http\Requests\TrainingHistoryStoreRequest;
use App\Http\Requests\TrainingHistoryUpdateRequest;

class TrainingHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TrainingHistory::class);

        $search = $request->get('search', '');

        $trainingHistories = TrainingHistory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.training_histories.index',
            compact('trainingHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TrainingHistory::class);

      
        $users = User::pluck('name', 'id');
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');

        return view(
            'app.training_histories.create',
            compact(
                'users',
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
    }

    /**
     * @param \App\Http\Requests\TrainingHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    // public function store(TrainingHistoryStoreRequest $request)
    public function store()
    {
        dd('test');
        $this->authorize('create', TrainingHistory::class);

        $validated = $request->validated();

        $trainingHistory = TrainingHistory::create($validated);

        return redirect()
            ->route('training-histories.edit', $trainingHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingHistory $trainingHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TrainingHistory $trainingHistory)
    {
        $this->authorize('view', $trainingHistory);

        return view('app.training_histories.show', compact('trainingHistory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingHistory $trainingHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TrainingHistory $trainingHistory)
    {
        $this->authorize('update', $trainingHistory);

        $users = User::pluck('name', 'id');
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');

        return view(
            'app.training_histories.edit',
            compact(
                'trainingHistory',
                'users',
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
    }

    /**
     * @param \App\Http\Requests\TrainingHistoryUpdateRequest $request
     * @param \App\Models\TrainingHistory $trainingHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        TrainingHistoryUpdateRequest $request,
        TrainingHistory $trainingHistory
    ) {
        $this->authorize('update', $trainingHistory);

        $validated = $request->validated();

        $trainingHistory->update($validated);

        return redirect()
            ->route('training-histories.edit', $trainingHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingHistory $trainingHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TrainingHistory $trainingHistory)
    {
        $this->authorize('delete', $trainingHistory);

        $trainingHistory->delete();

        return redirect()
            ->route('training-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
