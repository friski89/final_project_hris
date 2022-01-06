<?php

namespace App\Http\Controllers\Api;

use App\Models\WorkLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkLocationResource;
use App\Http\Resources\WorkLocationCollection;
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
            ->paginate();

        return new WorkLocationCollection($workLocations);
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

        return new WorkLocationResource($workLocation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('view', $workLocation);

        return new WorkLocationResource($workLocation);
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

        return new WorkLocationResource($workLocation);
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

        return response()->noContent();
    }
}
