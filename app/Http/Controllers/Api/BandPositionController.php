<?php

namespace App\Http\Controllers\Api;

use App\Models\BandPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BandPositionResource;
use App\Http\Resources\BandPositionCollection;
use App\Http\Requests\BandPositionStoreRequest;
use App\Http\Requests\BandPositionUpdateRequest;

class BandPositionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BandPosition::class);

        $search = $request->get('search', '');

        $bandPositions = BandPosition::search($search)
            ->latest()
            ->paginate();

        return new BandPositionCollection($bandPositions);
    }

    /**
     * @param \App\Http\Requests\BandPositionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BandPositionStoreRequest $request)
    {
        $this->authorize('create', BandPosition::class);

        $validated = $request->validated();

        $bandPosition = BandPosition::create($validated);

        return new BandPositionResource($bandPosition);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('view', $bandPosition);

        return new BandPositionResource($bandPosition);
    }

    /**
     * @param \App\Http\Requests\BandPositionUpdateRequest $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function update(
        BandPositionUpdateRequest $request,
        BandPosition $bandPosition
    ) {
        $this->authorize('update', $bandPosition);

        $validated = $request->validated();

        $bandPosition->update($validated);

        return new BandPositionResource($bandPosition);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('delete', $bandPosition);

        $bandPosition->delete();

        return response()->noContent();
    }
}
