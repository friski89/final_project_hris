<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;
use App\Http\Requests\JobTitleStoreRequest;
use App\Http\Requests\JobTitleUpdateRequest;

class JobTitleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobTitle::class);

        $search = $request->get('search', '');

        $jobTitles = JobTitle::search($search)
            ->latest()
            ->paginate(5);

        return view('app.job_titles.index', compact('jobTitles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobTitle::class);

        return view('app.job_titles.create');
    }

    /**
     * @param \App\Http\Requests\JobTitleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTitleStoreRequest $request)
    {
        $this->authorize('create', JobTitle::class);

        $validated = $request->validated();

        $jobTitle = JobTitle::create($validated);

        return redirect()
            ->route('job-titles.edit', $jobTitle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('view', $jobTitle);

        return view('app.job_titles.show', compact('jobTitle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('update', $jobTitle);

        return view('app.job_titles.edit', compact('jobTitle'));
    }

    /**
     * @param \App\Http\Requests\JobTitleUpdateRequest $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(JobTitleUpdateRequest $request, JobTitle $jobTitle)
    {
        $this->authorize('update', $jobTitle);

        $validated = $request->validated();

        $jobTitle->update($validated);

        return redirect()
            ->route('job-titles.edit', $jobTitle)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('delete', $jobTitle);

        $jobTitle->delete();

        return redirect()
            ->route('job-titles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
