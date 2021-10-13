<?php

namespace App\Http\Controllers\Api;

use App\Models\AlamatKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AlamatKerjaResource;
use App\Http\Resources\AlamatKerjaCollection;
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
            ->paginate();

        return new AlamatKerjaCollection($alamatKerjas);
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

        return new AlamatKerjaResource($alamatKerja);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AlamatKerja $alamatKerja
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AlamatKerja $alamatKerja)
    {
        $this->authorize('view', $alamatKerja);

        return new AlamatKerjaResource($alamatKerja);
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

        return new AlamatKerjaResource($alamatKerja);
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

        return response()->noContent();
    }
}
