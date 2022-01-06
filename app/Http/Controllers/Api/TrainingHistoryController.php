<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TrainingHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingHistoryResource;
use App\Http\Resources\TrainingHistoryCollection;
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
            ->paginate();

        return new TrainingHistoryCollection($trainingHistories);
    }

    /**
     * @param \App\Http\Requests\TrainingHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingHistoryStoreRequest $request)
    {
        $this->authorize('create', TrainingHistory::class);

        $validated = $request->validated();

        $trainingHistory = TrainingHistory::create($validated);

        return new TrainingHistoryResource($trainingHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingHistory $trainingHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TrainingHistory $trainingHistory)
    {
        $this->authorize('view', $trainingHistory);

        return new TrainingHistoryResource($trainingHistory);
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

        return new TrainingHistoryResource($trainingHistory);
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

        return response()->noContent();
    }
}
