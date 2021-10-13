<?php

namespace App\Http\Controllers\Api;

use App\Models\SubStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubStatusResource;
use App\Http\Resources\SubStatusCollection;
use App\Http\Requests\SubStatusStoreRequest;
use App\Http\Requests\SubStatusUpdateRequest;

class SubStatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SubStatus::class);

        $search = $request->get('search', '');

        $subStatuses = SubStatus::search($search)
            ->latest()
            ->paginate();

        return new SubStatusCollection($subStatuses);
    }

    /**
     * @param \App\Http\Requests\SubStatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubStatusStoreRequest $request)
    {
        $this->authorize('create', SubStatus::class);

        $validated = $request->validated();

        $subStatus = SubStatus::create($validated);

        return new SubStatusResource($subStatus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SubStatus $subStatus)
    {
        $this->authorize('view', $subStatus);

        return new SubStatusResource($subStatus);
    }

    /**
     * @param \App\Http\Requests\SubStatusUpdateRequest $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function update(
        SubStatusUpdateRequest $request,
        SubStatus $subStatus
    ) {
        $this->authorize('update', $subStatus);

        $validated = $request->validated();

        $subStatus->update($validated);

        return new SubStatusResource($subStatus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SubStatus $subStatus)
    {
        $this->authorize('delete', $subStatus);

        $subStatus->delete();

        return response()->noContent();
    }
}
