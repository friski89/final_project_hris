<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\OfficeFacilities;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeFacilitiesResource;
use App\Http\Resources\OfficeFacilitiesCollection;
use App\Http\Requests\OfficeFacilitiesStoreRequest;
use App\Http\Requests\OfficeFacilitiesUpdateRequest;

class OfficeFacilitiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OfficeFacilities::class);

        $search = $request->get('search', '');

        $allOfficeFacilities = OfficeFacilities::search($search)
            ->latest()
            ->paginate();

        return new OfficeFacilitiesCollection($allOfficeFacilities);
    }

    /**
     * @param \App\Http\Requests\OfficeFacilitiesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeFacilitiesStoreRequest $request)
    {
        $this->authorize('create', OfficeFacilities::class);

        $validated = $request->validated();

        $officeFacilities = OfficeFacilities::create($validated);

        return new OfficeFacilitiesResource($officeFacilities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OfficeFacilities $officeFacilities)
    {
        $this->authorize('view', $officeFacilities);

        return new OfficeFacilitiesResource($officeFacilities);
    }

    /**
     * @param \App\Http\Requests\OfficeFacilitiesUpdateRequest $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function update(
        OfficeFacilitiesUpdateRequest $request,
        OfficeFacilities $officeFacilities
    ) {
        $this->authorize('update', $officeFacilities);

        $validated = $request->validated();

        $officeFacilities->update($validated);

        return new OfficeFacilitiesResource($officeFacilities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        OfficeFacilities $officeFacilities
    ) {
        $this->authorize('delete', $officeFacilities);

        $officeFacilities->delete();

        return response()->noContent();
    }
}
