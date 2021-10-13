<?php

namespace App\Http\Controllers\Api;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyResource;
use App\Http\Resources\FamilyCollection;
use App\Http\Requests\FamilyStoreRequest;
use App\Http\Requests\FamilyUpdateRequest;

class FamilyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Family::class);

        $search = $request->get('search', '');

        $families = Family::search($search)
            ->latest()
            ->paginate();

        return new FamilyCollection($families);
    }

    /**
     * @param \App\Http\Requests\FamilyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyStoreRequest $request)
    {
        $this->authorize('create', Family::class);

        $validated = $request->validated();

        $family = Family::create($validated);

        return new FamilyResource($family);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Family $family)
    {
        $this->authorize('view', $family);

        return new FamilyResource($family);
    }

    /**
     * @param \App\Http\Requests\FamilyUpdateRequest $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyUpdateRequest $request, Family $family)
    {
        $this->authorize('update', $family);

        $validated = $request->validated();

        $family->update($validated);

        return new FamilyResource($family);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Family $family)
    {
        $this->authorize('delete', $family);

        $family->delete();

        return response()->noContent();
    }
}
