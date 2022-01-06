<?php

namespace App\Http\Controllers\Api;

use App\Models\JobGrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobGradeResource;
use App\Http\Resources\JobGradeCollection;
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
            ->paginate();

        return new JobGradeCollection($jobGrades);
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

        return new JobGradeResource($jobGrade);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobGrade $jobGrade
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobGrade $jobGrade)
    {
        $this->authorize('view', $jobGrade);

        return new JobGradeResource($jobGrade);
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

        return new JobGradeResource($jobGrade);
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

        return response()->noContent();
    }
}
