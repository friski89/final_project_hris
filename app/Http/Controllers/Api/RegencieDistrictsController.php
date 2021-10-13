<?php

namespace App\Http\Controllers\Api;

use App\Models\Regencie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\DistrictCollection;

class RegencieDistrictsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Regencie $regencie)
    {
        $this->authorize('view', $regencie);

        $search = $request->get('search', '');

        $districts = $regencie
            ->districts()
            ->search($search)
            ->latest()
            ->paginate();

        return new DistrictCollection($districts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Regencie $regencie)
    {
        $this->authorize('create', District::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $district = $regencie->districts()->create($validated);

        return new DistrictResource($district);
    }
}
