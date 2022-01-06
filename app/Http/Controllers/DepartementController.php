<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Departement;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.departements.index',
            compact('departements', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Departement::class);

        $divisions = Division::pluck('name', 'id');

        return view('app.departements.create', compact('divisions'));
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

        return redirect()
            ->route('departements.edit', $departement)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Departement $departement)
    {
        $this->authorize('view', $departement);

        return view('app.departements.show', compact('departement'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Departement $departement)
    {
        $this->authorize('update', $departement);

        $divisions = Division::pluck('name', 'id');

        return view(
            'app.departements.edit',
            compact('departement', 'divisions')
        );
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

        return redirect()
            ->route('departements.edit', $departement)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('departements.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
