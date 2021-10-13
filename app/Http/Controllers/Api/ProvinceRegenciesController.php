<?php

namespace App\Http\Controllers\Api;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegencieResource;
use App\Http\Resources\RegencieCollection;

class ProvinceRegenciesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Province $province)
    {
        $this->authorize('view', $province);

        $search = $request->get('search', '');

        $regencies = $province
            ->regencies()
            ->search($search)
            ->latest()
            ->paginate();

        return new RegencieCollection($regencies);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Province $province)
    {
        $this->authorize('create', Regencie::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $regencie = $province->regencies()->create($validated);

        return new RegencieResource($regencie);
    }
}
