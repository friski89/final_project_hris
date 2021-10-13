<?php

namespace App\Http\Controllers;

use App\Models\Regencie;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\RegencieStoreRequest;
use App\Http\Requests\RegencieUpdateRequest;

class RegencieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Regencie::class);

        $search = $request->get('search', '');

        $regencies = Regencie::search($search)
            ->latest()
            ->paginate(5);

        return view('app.regencies.index', compact('regencies', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Regencie::class);

        $provinces = Province::pluck('name', 'id');

        return view('app.regencies.create', compact('provinces'));
    }

    /**
     * @param \App\Http\Requests\RegencieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegencieStoreRequest $request)
    {
        $this->authorize('create', Regencie::class);

        $validated = $request->validated();

        $regencie = Regencie::create($validated);

        return redirect()
            ->route('regencies.edit', $regencie)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Regencie $regencie)
    {
        $this->authorize('view', $regencie);

        return view('app.regencies.show', compact('regencie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Regencie $regencie)
    {
        $this->authorize('update', $regencie);

        $provinces = Province::pluck('name', 'id');

        return view('app.regencies.edit', compact('regencie', 'provinces'));
    }

    /**
     * @param \App\Http\Requests\RegencieUpdateRequest $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function update(RegencieUpdateRequest $request, Regencie $regencie)
    {
        $this->authorize('update', $regencie);

        $validated = $request->validated();

        $regencie->update($validated);

        return redirect()
            ->route('regencies.edit', $regencie)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Regencie $regencie)
    {
        $this->authorize('delete', $regencie);

        $regencie->delete();

        return redirect()
            ->route('regencies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
