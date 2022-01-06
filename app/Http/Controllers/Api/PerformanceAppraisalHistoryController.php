<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerformanceAppraisalHistory;
use App\Http\Resources\PerformanceAppraisalHistoryResource;
use App\Http\Resources\PerformanceAppraisalHistoryCollection;
use App\Http\Requests\PerformanceAppraisalHistoryStoreRequest;
use App\Http\Requests\PerformanceAppraisalHistoryUpdateRequest;

class PerformanceAppraisalHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PerformanceAppraisalHistory::class);

        $search = $request->get('search', '');

        $performanceAppraisalHistories = PerformanceAppraisalHistory::search(
            $search
        )
            ->latest()
            ->paginate();

        return new PerformanceAppraisalHistoryCollection(
            $performanceAppraisalHistories
        );
    }

    /**
     * @param \App\Http\Requests\PerformanceAppraisalHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerformanceAppraisalHistoryStoreRequest $request)
    {
        $this->authorize('create', PerformanceAppraisalHistory::class);

        $validated = $request->validated();

        $performanceAppraisalHistory = PerformanceAppraisalHistory::create(
            $validated
        );

        return new PerformanceAppraisalHistoryResource(
            $performanceAppraisalHistory
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PerformanceAppraisalHistory $performanceAppraisalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        PerformanceAppraisalHistory $performanceAppraisalHistory
    ) {
        $this->authorize('view', $performanceAppraisalHistory);

        return new PerformanceAppraisalHistoryResource(
            $performanceAppraisalHistory
        );
    }

    /**
     * @param \App\Http\Requests\PerformanceAppraisalHistoryUpdateRequest $request
     * @param \App\Models\PerformanceAppraisalHistory $performanceAppraisalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        PerformanceAppraisalHistoryUpdateRequest $request,
        PerformanceAppraisalHistory $performanceAppraisalHistory
    ) {
        $this->authorize('update', $performanceAppraisalHistory);

        $validated = $request->validated();

        $performanceAppraisalHistory->update($validated);

        return new PerformanceAppraisalHistoryResource(
            $performanceAppraisalHistory
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PerformanceAppraisalHistory $performanceAppraisalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        PerformanceAppraisalHistory $performanceAppraisalHistory
    ) {
        $this->authorize('delete', $performanceAppraisalHistory);

        $performanceAppraisalHistory->delete();

        return response()->noContent();
    }
}
