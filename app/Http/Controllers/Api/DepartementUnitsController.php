<?php

namespace App\Http\Controllers\Api;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Resources\UnitResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitCollection;

class DepartementUnitsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Departement $departement)
    {
        $this->authorize('view', $departement);

        $search = $request->get('search', '');

        $units = $departement
            ->units()
            ->search($search)
            ->latest()
            ->paginate();

        return new UnitCollection($units);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Departement $departement)
    {
        $this->authorize('create', Unit::class);

        $validated = $request->validate([
            'name' => ['required', 'unique:units,name', 'max:100', 'string'],
        ]);

        $unit = $departement->units()->create($validated);

        return new UnitResource($unit);
    }
}
