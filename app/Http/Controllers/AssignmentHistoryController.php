<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use Illuminate\Http\Request;
use App\Models\AssignmentHistory;
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
            ->paginate(5);

        return view(
            'app.assignment_histories.index',
            compact('assignmentHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AssignmentHistory::class);

        $companyHomes = CompanyHome::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.assignment_histories.create',
            compact('companyHomes', 'jobTitles', 'users')
        );
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

        return redirect()
            ->route('assignment-histories.edit', $assignmentHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignmentHistory $assignmentHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssignmentHistory $assignmentHistory)
    {
        $this->authorize('view', $assignmentHistory);

        return view(
            'app.assignment_histories.show',
            compact('assignmentHistory')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignmentHistory $assignmentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AssignmentHistory $assignmentHistory)
    {
        $this->authorize('update', $assignmentHistory);

        $companyHomes = CompanyHome::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.assignment_histories.edit',
            compact('assignmentHistory', 'companyHomes', 'jobTitles', 'users')
        );
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

        return redirect()
            ->route('assignment-histories.edit', $assignmentHistory)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('assignment-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
