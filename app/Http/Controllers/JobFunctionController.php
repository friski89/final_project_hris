<?php

namespace App\Http\Controllers;

use App\Models\JobFunction;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.job_functions.index',
            compact('jobFunctions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobFunction::class);

        return view('app.job_functions.create');
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

        return redirect()
            ->route('job-functions.edit', $jobFunction)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFunction $jobFunction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobFunction $jobFunction)
    {
        $this->authorize('view', $jobFunction);

        return view('app.job_functions.show', compact('jobFunction'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFunction $jobFunction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobFunction $jobFunction)
    {
        $this->authorize('update', $jobFunction);

        return view('app.job_functions.edit', compact('jobFunction'));
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

        return redirect()
            ->route('job-functions.edit', $jobFunction)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('job-functions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
