<?php

namespace App\Http\Controllers\Api;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\DivisionCollection;
use App\Http\Requests\DivisionStoreRequest;
use App\Http\Requests\DivisionUpdateRequest;

class DivisionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Division::class);

        $search = $request->get('search', '');

        $divisions = Division::search($search)
            ->latest()
            ->paginate();

        return new DivisionCollection($divisions);
    }

    /**
     * @param \App\Http\Requests\DivisionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionStoreRequest $request)
    {
        $this->authorize('create', Division::class);

        $validated = $request->validated();

        $division = Division::create($validated);

        return new DivisionResource($division);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Division $division)
    {
        $this->authorize('view', $division);

        return new DivisionResource($division);
    }

    /**
     * @param \App\Http\Requests\DivisionUpdateRequest $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionUpdateRequest $request, Division $division)
    {
        $this->authorize('update', $division);

        $validated = $request->validated();

        $division->update($validated);

        return new DivisionResource($division);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Division $division)
    {
        $this->authorize('delete', $division);

        $division->delete();

        return response()->noContent();
    }
}
