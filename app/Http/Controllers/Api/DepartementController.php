<?php

namespace App\Http\Controllers\Api;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartementResource;
use App\Http\Resources\DepartementCollection;
use App\Http\Requests\DepartementStoreRequest;
use App\Http\Requests\DepartementUpdateRequest;

class DepartementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Departement::class);

        $search = $request->get('search', '');

        $departements = Departement::search($search)
            ->latest()
            ->paginate();

        return new DepartementCollection($departements);
    }

    /**
     * @param \App\Http\Requests\DepartementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementStoreRequest $request)
    {
        $this->authorize('create', Departement::class);

        $validated = $request->validated();

        $departement = Departement::create($validated);

        return new DepartementResource($departement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Departement $departement)
    {
        $this->authorize('view', $departement);

        return new DepartementResource($departement);
    }

    /**
     * @param \App\Http\Requests\DepartementUpdateRequest $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function update(
        DepartementUpdateRequest $request,
        Departement $departement
    ) {
        $this->authorize('update', $departement);

        $validated = $request->validated();

        $departement->update($validated);

        return new DepartementResource($departement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Departement $departement)
    {
        $this->authorize('delete', $departement);

        $departement->delete();

        return response()->noContent();
    }
}
