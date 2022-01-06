<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Direktorat;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.divisions.index', compact('divisions', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Division::class);

        $direktorats = Direktorat::pluck('name', 'id');

        return view('app.divisions.create', compact('direktorats'));
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

        return redirect()
            ->route('divisions.edit', $division)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Division $division)
    {
        $this->authorize('view', $division);

        return view('app.divisions.show', compact('division'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Division $division)
    {
        $this->authorize('update', $division);

        $direktorats = Direktorat::pluck('name', 'id');

        return view('app.divisions.edit', compact('division', 'direktorats'));
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

        return redirect()
            ->route('divisions.edit', $division)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('divisions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
