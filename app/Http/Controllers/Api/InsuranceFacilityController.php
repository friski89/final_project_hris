<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\InsuranceFacility;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceFacilityResource;
use App\Http\Resources\InsuranceFacilityCollection;
use App\Http\Requests\InsuranceFacilityStoreRequest;
use App\Http\Requests\InsuranceFacilityUpdateRequest;

class InsuranceFacilityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InsuranceFacility::class);

        $search = $request->get('search', '');

        $insuranceFacilities = InsuranceFacility::search($search)
            ->latest()
            ->paginate();

        return new InsuranceFacilityCollection($insuranceFacilities);
    }

    /**
     * @param \App\Http\Requests\InsuranceFacilityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceFacilityStoreRequest $request)
    {
        $this->authorize('create', InsuranceFacility::class);

        $validated = $request->validated();

        $insuranceFacility = InsuranceFacility::create($validated);

        return new InsuranceFacilityResource($insuranceFacility);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InsuranceFacility $insuranceFacility)
    {
        $this->authorize('view', $insuranceFacility);

        return new InsuranceFacilityResource($insuranceFacility);
    }

    /**
     * @param \App\Http\Requests\InsuranceFacilityUpdateRequest $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function update(
        InsuranceFacilityUpdateRequest $request,
        InsuranceFacility $insuranceFacility
    ) {
        $this->authorize('update', $insuranceFacility);

        $validated = $request->validated();

        $insuranceFacility->update($validated);

        return new InsuranceFacilityResource($insuranceFacility);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        InsuranceFacility $insuranceFacility
    ) {
        $this->authorize('delete', $insuranceFacility);

        $insuranceFacility->delete();

        return response()->noContent();
    }
}
