<?php

namespace App\Http\Controllers\Api;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\ProvinceCollection;
use App\Http\Requests\ProvinceStoreRequest;
use App\Http\Requests\ProvinceUpdateRequest;

class ProvinceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Province::class);

        $search = $request->get('search', '');

        $provinces = Province::search($search)
            ->latest()
            ->paginate();

        return new ProvinceCollection($provinces);
    }

    /**
     * @param \App\Http\Requests\ProvinceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceStoreRequest $request)
    {
        $this->authorize('create', Province::class);

        $validated = $request->validated();

        $province = Province::create($validated);

        return new ProvinceResource($province);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Province $province)
    {
        $this->authorize('view', $province);

        return new ProvinceResource($province);
    }

    /**
     * @param \App\Http\Requests\ProvinceUpdateRequest $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceUpdateRequest $request, Province $province)
    {
        $this->authorize('update', $province);

        $validated = $request->validated();

        $province->update($validated);

        return new ProvinceResource($province);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Province $province)
    {
        $this->authorize('delete', $province);

        $province->delete();

        return response()->noContent();
    }
}
