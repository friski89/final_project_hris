<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerformanceAppraisalHistoryResource;
use App\Http\Resources\PerformanceAppraisalHistoryCollection;

class UserPerformanceAppraisalHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $performanceAppraisalHistories = $user
            ->performanceAppraisalHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new PerformanceAppraisalHistoryCollection(
            $performanceAppraisalHistories
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', PerformanceAppraisalHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'year' => ['required', 'numeric'],
            'performance_value' => ['required', 'max:255', 'string'],
            'performance_score' => ['required', 'max:255', 'string'],
            'competency_value' => ['required', 'max:255', 'string'],
            'behavioral_value' => ['required', 'max:255', 'string'],
        ]);

        $performanceAppraisalHistory = $user
            ->performanceAppraisalHistories()
            ->create($validated);

        return new PerformanceAppraisalHistoryResource(
            $performanceAppraisalHistory
        );
    }
}
