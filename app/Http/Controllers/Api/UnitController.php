<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Resources\UnitResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitCollection;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;

class UnitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Unit::class);

        $search = $request->get('search', '');

        $units = Unit::search($search)
            ->latest()
            ->paginate();

        return new UnitCollection($units);
    }

    /**
     * @param \App\Http\Requests\UnitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStoreRequest $request)
    {
        $this->authorize('create', Unit::class);

        $validated = $request->validated();

        $unit = Unit::create($validated);

        return new UnitResource($unit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Unit $unit)
    {
        $this->authorize('view', $unit);

        return new UnitResource($unit);
    }

    /**
     * @param \App\Http\Requests\UnitUpdateRequest $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, Unit $unit)
    {
        $this->authorize('update', $unit);

        $validated = $request->validated();

        $unit->update($validated);

        return new UnitResource($unit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Unit $unit)
    {
        $this->authorize('delete', $unit);

        $unit->delete();

        return response()->noContent();
    }
}
