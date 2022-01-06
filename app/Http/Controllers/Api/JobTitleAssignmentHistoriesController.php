<?php

namespace App\Http\Controllers\Api;

use App\Models\JobTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentHistoryResource;
use App\Http\Resources\AssignmentHistoryCollection;

class JobTitleAssignmentHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('view', $jobTitle);

        $search = $request->get('search', '');

        $assignmentHistories = $jobTitle
            ->assignmentHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new AssignmentHistoryCollection($assignmentHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('create', AssignmentHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $assignmentHistory = $jobTitle
            ->assignmentHistories()
            ->create($validated);

        return new AssignmentHistoryResource($assignmentHistory);
    }
}
