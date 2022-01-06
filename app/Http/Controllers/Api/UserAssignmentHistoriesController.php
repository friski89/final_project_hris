<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentHistoryResource;
use App\Http\Resources\AssignmentHistoryCollection;

class UserAssignmentHistoriesController extends Controller
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

        $assignmentHistories = $user
            ->assignmentHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new AssignmentHistoryCollection($assignmentHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', AssignmentHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
        ]);

        $assignmentHistory = $user->assignmentHistories()->create($validated);

        return new AssignmentHistoryResource($assignmentHistory);
    }
}
