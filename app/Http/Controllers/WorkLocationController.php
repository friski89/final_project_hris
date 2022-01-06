<?php

namespace App\Http\Controllers;

use App\Models\WorkLocation;
use Illuminate\Http\Request;
use App\Http\Requests\WorkLocationStoreRequest;
use App\Http\Requests\WorkLocationUpdateRequest;

class WorkLocationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', WorkLocation::class);

        $search = $request->get('search', '');

        $workLocations = WorkLocation::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.work_locations.index',
            compact('workLocations', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', WorkLocation::class);

        return view('app.work_locations.create');
    }

    /**
     * @param \App\Http\Requests\WorkLocationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkLocationStoreRequest $request)
    {
        $this->authorize('create', WorkLocation::class);

        $validated = $request->validated();

        $workLocation = WorkLocation::create($validated);

        return redirect()
            ->route('work-locations.edit', $workLocation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('view', $workLocation);

        return view('app.work_locations.show', compact('workLocation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('update', $workLocation);

        return view('app.work_locations.edit', compact('workLocation'));
    }

    /**
     * @param \App\Http\Requests\WorkLocationUpdateRequest $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function update(
        WorkLocationUpdateRequest $request,
        WorkLocation $workLocation
    ) {
        $this->authorize('update', $workLocation);

        $validated = $request->validated();

        $workLocation->update($validated);

        return redirect()
            ->route('work-locations.edit', $workLocation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('delete', $workLocation);

        $workLocation->delete();

        return redirect()
            ->route('work-locations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
