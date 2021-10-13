<?php

namespace App\Http\Controllers\Api;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\DistrictCollection;
use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;

class DistrictController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', District::class);

        $search = $request->get('search', '');

        $districts = District::search($search)
            ->latest()
            ->paginate();

        return new DistrictCollection($districts);
    }

    /**
     * @param \App\Http\Requests\DistrictStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictStoreRequest $request)
    {
        $this->authorize('create', District::class);

        $validated = $request->validated();

        $district = District::create($validated);

        return new DistrictResource($district);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, District $district)
    {
        $this->authorize('view', $district);

        return new DistrictResource($district);
    }

    /**
     * @param \App\Http\Requests\DistrictUpdateRequest $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictUpdateRequest $request, District $district)
    {
        $this->authorize('update', $district);

        $validated = $request->validated();

        $district->update($validated);

        return new DistrictResource($district);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, District $district)
    {
        $this->authorize('delete', $district);

        $district->delete();

        return response()->noContent();
    }
}
