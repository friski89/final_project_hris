<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentHistoryResource;
use App\Http\Resources\AssignmentHistoryCollection;

class CompanyHomeAssignmentHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('view', $companyHome);

        $search = $request->get('search', '');

        $assignmentHistories = $companyHome
            ->assignmentHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new AssignmentHistoryCollection($assignmentHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('create', AssignmentHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $assignmentHistory = $companyHome
            ->assignmentHistories()
            ->create($validated);

        return new AssignmentHistoryResource($assignmentHistory);
    }
}
