<?php

namespace App\Http\Controllers;

use App\Models\JobGrade;
use Illuminate\Http\Request;
use App\Http\Requests\JobGradeStoreRequest;
use App\Http\Requests\JobGradeUpdateRequest;

class JobGradeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobGrade::class);

        $search = $request->get('search', '');

        $jobGrades = JobGrade::search($search)
            ->latest()
            ->paginate(5);

        return view('app.job_grades.index', compact('jobGrades', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobGrade::class);

        return view('app.job_grades.create');
    }

    /**
     * @param \App\Http\Requests\JobGradeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobGradeStoreRequest $request)
    {
        $this->authorize('create', JobGrade::class);

        $validated = $request->validated();

        $jobGrade = JobGrade::create($validated);

        return redirect()
            ->route('job-grades.edit', $jobGrade)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobGrade $jobGrade
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobGrade $jobGrade)
    {
        $this->authorize('view', $jobGrade);

        return view('app.job_grades.show', compact('jobGrade'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobGrade $jobGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobGrade $jobGrade)
    {
        $this->authorize('update', $jobGrade);

        return view('app.job_grades.edit', compact('jobGrade'));
    }

    /**
     * @param \App\Http\Requests\JobGradeUpdateRequest $request
     * @param \App\Models\JobGrade $jobGrade
     * @return \Illuminate\Http\Response
     */
    public function update(JobGradeUpdateRequest $request, JobGrade $jobGrade)
    {
        $this->authorize('update', $jobGrade);

        $validated = $request->validated();

        $jobGrade->update($validated);

        return redirect()
            ->route('job-grades.edit', $jobGrade)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobGrade $jobGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobGrade $jobGrade)
    {
        $this->authorize('delete', $jobGrade);

        $jobGrade->delete();

        return redirect()
            ->route('job-grades.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
