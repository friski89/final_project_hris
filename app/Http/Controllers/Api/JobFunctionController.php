<?php

namespace App\Http\Controllers\Api;

use App\Models\JobFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobFunctionResource;
use App\Http\Resources\JobFunctionCollection;
use App\Http\Requests\JobFunctionStoreRequest;
use App\Http\Requests\JobFunctionUpdateRequest;

class JobFunctionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobFunction::class);

        $search = $request->get('search', '');

        $jobFunctions = JobFunction::search($search)
            ->latest()
            ->paginate();

        return new JobFunctionCollection($jobFunctions);
    }

    /**
     * @param \App\Http\Requests\JobFunctionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobFunctionStoreRequest $request)
    {
        $this->authorize('create', JobFunction::class);

        $validated = $request->validated();

        $jobFunction = JobFunction::create($validated);

        return new JobFunctionResource($jobFunction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFunction $jobFunction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobFunction $jobFunction)
    {
        $this->authorize('view', $jobFunction);

        return new JobFunctionResource($jobFunction);
    }

    /**
     * @param \App\Http\Requests\JobFunctionUpdateRequest $request
     * @param \App\Models\JobFunction $jobFunction
     * @return \Illuminate\Http\Response
     */
    public function update(
        JobFunctionUpdateRequest $request,
        JobFunction $jobFunction
    ) {
        $this->authorize('update', $jobFunction);

        $validated = $request->validated();

        $jobFunction->update($validated);

        return new JobFunctionResource($jobFunction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFunction $jobFunction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobFunction $jobFunction)
    {
        $this->authorize('delete', $jobFunction);

        $jobFunction->delete();

        return response()->noContent();
    }
}
