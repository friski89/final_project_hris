<?php

namespace App\Http\Controllers;

use App\Models\JobFamily;
use Illuminate\Http\Request;
use App\Http\Requests\JobFamilyStoreRequest;
use App\Http\Requests\JobFamilyUpdateRequest;

class JobFamilyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobFamily::class);

        $search = $request->get('search', '');

        $jobFamilies = JobFamily::search($search)
            ->latest()
            ->paginate(5);

        return view('app.job_families.index', compact('jobFamilies', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobFamily::class);

        return view('app.job_families.create');
    }

    /**
     * @param \App\Http\Requests\JobFamilyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobFamilyStoreRequest $request)
    {
        $this->authorize('create', JobFamily::class);

        $validated = $request->validated();

        $jobFamily = JobFamily::create($validated);

        return redirect()
            ->route('job-families.edit', $jobFamily)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('view', $jobFamily);

        return view('app.job_families.show', compact('jobFamily'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('update', $jobFamily);

        return view('app.job_families.edit', compact('jobFamily'));
    }

    /**
     * @param \App\Http\Requests\JobFamilyUpdateRequest $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function update(
        JobFamilyUpdateRequest $request,
        JobFamily $jobFamily
    ) {
        $this->authorize('update', $jobFamily);

        $validated = $request->validated();

        $jobFamily->update($validated);

        return redirect()
            ->route('job-families.edit', $jobFamily)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('delete', $jobFamily);

        $jobFamily->delete();

        return redirect()
            ->route('job-families.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
