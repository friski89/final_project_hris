<?php

namespace App\Http\Controllers\Api;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartementResource;
use App\Http\Resources\DepartementCollection;

class DivisionDepartementsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Division $division)
    {
        $this->authorize('view', $division);

        $search = $request->get('search', '');

        $departements = $division
            ->departements()
            ->search($search)
            ->latest()
            ->paginate();

        return new DepartementCollection($departements);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Division $division)
    {
        $this->authorize('create', Departement::class);

        $validated = $request->validate([
            'name' => [
                'required',
                'unique:departements,name',
                'max:255',
                'string',
            ],
        ]);

        $departement = $division->departements()->create($validated);

        return new DepartementResource($departement);
    }
}
