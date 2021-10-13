<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Departement;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.units.index', compact('units', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Unit::class);

        $departements = Departement::pluck('name', 'id');

        return view('app.units.create', compact('departements'));
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

        return redirect()
            ->route('units.edit', $unit)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Unit $unit)
    {
        $this->authorize('view', $unit);

        return view('app.units.show', compact('unit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Unit $unit)
    {
        $this->authorize('update', $unit);

        $departements = Departement::pluck('name', 'id');

        return view('app.units.edit', compact('unit', 'departements'));
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

        return redirect()
            ->route('units.edit', $unit)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('units.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
