<?php

namespace App\Http\Controllers\Api;

use App\Models\JobFamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobFamilyResource;
use App\Http\Resources\JobFamilyCollection;
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
            ->paginate();

        return new JobFamilyCollection($jobFamilies);
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

        return new JobFamilyResource($jobFamily);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('view', $jobFamily);

        return new JobFamilyResource($jobFamily);
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

        return new JobFamilyResource($jobFamily);
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

        return response()->noContent();
    }
}
