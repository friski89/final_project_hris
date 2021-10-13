<?php

namespace App\Http\Controllers\Api;

use App\Models\JobTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobTitleResource;
use App\Http\Resources\JobTitleCollection;
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
            ->paginate();

        return new JobTitleCollection($jobTitles);
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

        return new JobTitleResource($jobTitle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobTitle $jobTitle)
    {
        $this->authorize('view', $jobTitle);

        return new JobTitleResource($jobTitle);
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

        return new JobTitleResource($jobTitle);
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

        return response()->noContent();
    }
}
