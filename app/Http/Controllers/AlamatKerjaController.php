<?php

namespace App\Http\Controllers;

use App\Models\AlamatKerja;
use Illuminate\Http\Request;
use App\Models\WorkLocation;
use App\Http\Requests\AlamatKerjaStoreRequest;
use App\Http\Requests\AlamatKerjaUpdateRequest;

class AlamatKerjaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AlamatKerja::class);

        $search = $request->get('search', '');

        $alamatKerjas = AlamatKerja::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.alamat_kerjas.index',
            compact('alamatKerjas', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AlamatKerja::class);

        $workLocations = WorkLocation::pluck('name', 'id');

        return view('app.alamat_kerjas.create', compact('workLocations'));
    }

    /**
     * @param \App\Http\Requests\AlamatKerjaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlamatKerjaStoreRequest $request)
    {
        $this->authorize('create', AlamatKerja::class);

        $validated = $request->validated();

        $alamatKerja = AlamatKerja::create($validated);

        return redirect()
            ->route('alamat-kerjas.edit', $alamatKerja)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AlamatKerja $alamatKerja
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AlamatKerja $alamatKerja)
    {
        $this->authorize('view', $alamatKerja);

        return view('app.alamat_kerjas.show', compact('alamatKerja'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AlamatKerja $alamatKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AlamatKerja $alamatKerja)
    {
        $this->authorize('update', $alamatKerja);

        $workLocations = WorkLocation::pluck('name', 'id');

        return view(
            'app.alamat_kerjas.edit',
            compact('alamatKerja', 'workLocations')
        );
    }

    /**
     * @param \App\Http\Requests\AlamatKerjaUpdateRequest $request
     * @param \App\Models\AlamatKerja $alamatKerja
     * @return \Illuminate\Http\Response
     */
    public function update(
        AlamatKerjaUpdateRequest $request,
        AlamatKerja $alamatKerja
    ) {
        $this->authorize('update', $alamatKerja);

        $validated = $request->validated();

        $alamatKerja->update($validated);

        return redirect()
            ->route('alamat-kerjas.edit', $alamatKerja)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AlamatKerja $alamatKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AlamatKerja $alamatKerja)
    {
        $this->authorize('delete', $alamatKerja);

        $alamatKerja->delete();

        return redirect()
            ->route('alamat-kerjas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
