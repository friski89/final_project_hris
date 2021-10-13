<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ServiceHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceHistoryResource;
use App\Http\Resources\ServiceHistoryCollection;
use App\Http\Requests\ServiceHistoryStoreRequest;
use App\Http\Requests\ServiceHistoryUpdateRequest;

class ServiceHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ServiceHistory::class);

        $search = $request->get('search', '');

        $serviceHistories = ServiceHistory::search($search)
            ->latest()
            ->paginate();

        return new ServiceHistoryCollection($serviceHistories);
    }

    /**
     * @param \App\Http\Requests\ServiceHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceHistoryStoreRequest $request)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validated();

        $serviceHistory = ServiceHistory::create($validated);

        return new ServiceHistoryResource($serviceHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ServiceHistory $serviceHistory)
    {
        $this->authorize('view', $serviceHistory);

        return new ServiceHistoryResource($serviceHistory);
    }

    /**
     * @param \App\Http\Requests\ServiceHistoryUpdateRequest $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ServiceHistoryUpdateRequest $request,
        ServiceHistory $serviceHistory
    ) {
        $this->authorize('update', $serviceHistory);

        $validated = $request->validated();

        $serviceHistory->update($validated);

        return new ServiceHistoryResource($serviceHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceHistory $serviceHistory)
    {
        $this->authorize('delete', $serviceHistory);

        $serviceHistory->delete();

        return response()->noContent();
    }
}
