<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerformanceAppraisalHistory;
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
            ->paginate(5);

        return view(
            'app.performance_appraisal_histories.index',
            compact('performanceAppraisalHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PerformanceAppraisalHistory::class);

        $users = User::pluck('name', 'id');

        return view(
            'app.performance_appraisal_histories.create',
            compact('users')
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

        return redirect()
            ->route(
                'performance-appraisal-histories.edit',
                $performanceAppraisalHistory
            )
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.performance_appraisal_histories.show',
            compact('performanceAppraisalHistory')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PerformanceAppraisalHistory $performanceAppraisalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        PerformanceAppraisalHistory $performanceAppraisalHistory
    ) {
        $this->authorize('update', $performanceAppraisalHistory);

        $users = User::pluck('name', 'id');

        return view(
            'app.performance_appraisal_histories.edit',
            compact('performanceAppraisalHistory', 'users')
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

        return redirect()
            ->route(
                'performance-appraisal-histories.edit',
                $performanceAppraisalHistory
            )
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('performance-appraisal-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
