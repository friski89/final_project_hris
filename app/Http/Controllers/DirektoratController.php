<?php

namespace App\Http\Controllers;

use App\Models\Direktorat;
use Illuminate\Http\Request;
use App\Http\Requests\DirektoratStoreRequest;
use App\Http\Requests\DirektoratUpdateRequest;

class DirektoratController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Direktorat::class);

        $search = $request->get('search', '');

        $direktorats = Direktorat::search($search)
            ->latest()
            ->paginate(5);

        return view('app.direktorats.index', compact('direktorats', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Direktorat::class);

        return view('app.direktorats.create');
    }

    /**
     * @param \App\Http\Requests\DirektoratStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirektoratStoreRequest $request)
    {
        $this->authorize('create', Direktorat::class);

        $validated = $request->validated();

        $direktorat = Direktorat::create($validated);

        return redirect()
            ->route('direktorats.edit', $direktorat)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Direktorat $direktorat)
    {
        $this->authorize('view', $direktorat);

        return view('app.direktorats.show', compact('direktorat'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Direktorat $direktorat)
    {
        $this->authorize('update', $direktorat);

        return view('app.direktorats.edit', compact('direktorat'));
    }

    /**
     * @param \App\Http\Requests\DirektoratUpdateRequest $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function update(
        DirektoratUpdateRequest $request,
        Direktorat $direktorat
    ) {
        $this->authorize('update', $direktorat);

        $validated = $request->validated();

        $direktorat->update($validated);

        return redirect()
            ->route('direktorats.edit', $direktorat)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Direktorat $direktorat)
    {
        $this->authorize('delete', $direktorat);

        $direktorat->delete();

        return redirect()
            ->route('direktorats.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
