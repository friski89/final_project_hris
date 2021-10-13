<?php

namespace App\Http\Controllers\Api;

use App\Models\WorkLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AlamatKerjaResource;
use App\Http\Resources\AlamatKerjaCollection;

class WorkLocationAlamatKerjasController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('view', $workLocation);

        $search = $request->get('search', '');

        $alamatKerjas = $workLocation
            ->alamatKerjas()
            ->search($search)
            ->latest()
            ->paginate();

        return new AlamatKerjaCollection($alamatKerjas);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkLocation $workLocation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WorkLocation $workLocation)
    {
        $this->authorize('create', AlamatKerja::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $alamatKerja = $workLocation->alamatKerjas()->create($validated);

        return new AlamatKerjaResource($alamatKerja);
    }
}
