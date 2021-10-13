<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanStoreRequest;
use App\Http\Requests\JabatanUpdateRequest;

class JabatanController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Jabatan::class);

        $search = $request->get('search', '');

        $jabatans = Jabatan::search($search)
            ->latest()
            ->paginate(5);

        return view('app.jabatans.index', compact('jabatans', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Jabatan::class);

        return view('app.jabatans.create');
    }

    /**
     * @param \App\Http\Requests\JabatanStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanStoreRequest $request)
    {
        $this->authorize('create', Jabatan::class);

        $validated = $request->validated();

        $jabatan = Jabatan::create($validated);

        return redirect()
            ->route('jabatans.edit', $jabatan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Jabatan $jabatan)
    {
        $this->authorize('view', $jabatan);

        return view('app.jabatans.show', compact('jabatan'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Jabatan $jabatan)
    {
        $this->authorize('update', $jabatan);

        return view('app.jabatans.edit', compact('jabatan'));
    }

    /**
     * @param \App\Http\Requests\JabatanUpdateRequest $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanUpdateRequest $request, Jabatan $jabatan)
    {
        $this->authorize('update', $jabatan);

        $validated = $request->validated();

        $jabatan->update($validated);

        return redirect()
            ->route('jabatans.edit', $jabatan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Jabatan $jabatan)
    {
        $this->authorize('delete', $jabatan);

        $jabatan->delete();

        return redirect()
            ->route('jabatans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
