<?php

namespace App\Http\Controllers\Api;

use App\Models\Regencie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegencieResource;
use App\Http\Resources\RegencieCollection;
use App\Http\Requests\RegencieStoreRequest;
use App\Http\Requests\RegencieUpdateRequest;

class RegencieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Regencie::class);

        $search = $request->get('search', '');

        $regencies = Regencie::search($search)
            ->latest()
            ->paginate();

        return new RegencieCollection($regencies);
    }

    /**
     * @param \App\Http\Requests\RegencieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegencieStoreRequest $request)
    {
        $this->authorize('create', Regencie::class);

        $validated = $request->validated();

        $regencie = Regencie::create($validated);

        return new RegencieResource($regencie);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Regencie $regencie)
    {
        $this->authorize('view', $regencie);

        return new RegencieResource($regencie);
    }

    /**
     * @param \App\Http\Requests\RegencieUpdateRequest $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function update(RegencieUpdateRequest $request, Regencie $regencie)
    {
        $this->authorize('update', $regencie);

        $validated = $request->validated();

        $regencie->update($validated);

        return new RegencieResource($regencie);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regencie $regencie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Regencie $regencie)
    {
        $this->authorize('delete', $regencie);

        $regencie->delete();

        return response()->noContent();
    }
}
