<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AssignmentHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentHistoryResource;
use App\Http\Resources\AssignmentHistoryCollection;
use App\Http\Requests\AssignmentHistoryStoreRequest;
use App\Http\Requests\AssignmentHistoryUpdateRequest;

class AssignmentHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AssignmentHistory::class);

        $search = $request->get('search', '');

        $assignmentHistories = AssignmentHistory::search($search)
            ->latest()
            ->paginate();

        return new AssignmentHistoryCollection($assignmentHistories);
    }

    /**
     * @param \App\Http\Requests\AssignmentHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentHistoryStoreRequest $request)
    {
        $this->authorize('create', AssignmentHistory::class);

        $validated = $request->validated();

        $assignmentHistory = AssignmentHistory::create($validated);

        return new AssignmentHistoryResource($assignmentHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignmentHistory $assignmentHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssignmentHistory $assignmentHistory)
    {
        $this->authorize('view', $assignmentHistory);

        return new AssignmentHistoryResource($assignmentHistory);
    }

    /**
     * @param \App\Http\Requests\AssignmentHistoryUpdateRequest $request
     * @param \App\Models\AssignmentHistory $assignmentHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        AssignmentHistoryUpdateRequest $request,
        AssignmentHistory $assignmentHistory
    ) {
        $this->authorize('update', $assignmentHistory);

        $validated = $request->validated();

        $assignmentHistory->update($validated);

        return new AssignmentHistoryResource($assignmentHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignmentHistory $assignmentHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        AssignmentHistory $assignmentHistory
    ) {
        $this->authorize('delete', $assignmentHistory);

        $assignmentHistory->delete();

        return response()->noContent();
    }
}
