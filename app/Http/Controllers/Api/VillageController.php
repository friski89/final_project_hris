<?php

namespace App\Http\Controllers\Api;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Http\Resources\VillageCollection;
use App\Http\Requests\VillageStoreRequest;
use App\Http\Requests\VillageUpdateRequest;

class VillageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Village::class);

        $search = $request->get('search', '');

        $villages = Village::search($search)
            ->latest()
            ->paginate();

        return new VillageCollection($villages);
    }

    /**
     * @param \App\Http\Requests\VillageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillageStoreRequest $request)
    {
        $this->authorize('create', Village::class);

        $validated = $request->validated();

        $village = Village::create($validated);

        return new VillageResource($village);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Village $village)
    {
        $this->authorize('view', $village);

        return new VillageResource($village);
    }

    /**
     * @param \App\Http\Requests\VillageUpdateRequest $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function update(VillageUpdateRequest $request, Village $village)
    {
        $this->authorize('update', $village);

        $validated = $request->validated();

        $village->update($validated);

        return new VillageResource($village);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Village $village)
    {
        $this->authorize('delete', $village);

        $village->delete();

        return response()->noContent();
    }
}
