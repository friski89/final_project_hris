<?php

namespace App\Http\Controllers\Api;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Http\Resources\VillageCollection;

class DistrictVillagesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, District $district)
    {
        $this->authorize('view', $district);

        $search = $request->get('search', '');

        $villages = $district
            ->villages()
            ->search($search)
            ->latest()
            ->paginate();

        return new VillageCollection($villages);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, District $district)
    {
        $this->authorize('create', Village::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'kode_pos' => [
                'required',
                'unique:villages,kode_pos',
                'max:255',
                'string',
            ],
        ]);

        $village = $district->villages()->create($validated);

        return new VillageResource($village);
    }
}
