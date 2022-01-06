<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\OtherCompetencies;
use App\Http\Controllers\Controller;
use App\Http\Resources\OtherCompetenciesResource;
use App\Http\Resources\OtherCompetenciesCollection;
use App\Http\Requests\OtherCompetenciesStoreRequest;
use App\Http\Requests\OtherCompetenciesUpdateRequest;

class OtherCompetenciesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OtherCompetencies::class);

        $search = $request->get('search', '');

        $allOtherCompetencies = OtherCompetencies::search($search)
            ->latest()
            ->paginate();

        return new OtherCompetenciesCollection($allOtherCompetencies);
    }

    /**
     * @param \App\Http\Requests\OtherCompetenciesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtherCompetenciesStoreRequest $request)
    {
        $this->authorize('create', OtherCompetencies::class);

        $validated = $request->validated();

        $otherCompetencies = OtherCompetencies::create($validated);

        return new OtherCompetenciesResource($otherCompetencies);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OtherCompetencies $otherCompetencies)
    {
        $this->authorize('view', $otherCompetencies);

        return new OtherCompetenciesResource($otherCompetencies);
    }

    /**
     * @param \App\Http\Requests\OtherCompetenciesUpdateRequest $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function update(
        OtherCompetenciesUpdateRequest $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('update', $otherCompetencies);

        $validated = $request->validated();

        $otherCompetencies->update($validated);

        return new OtherCompetenciesResource($otherCompetencies);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('delete', $otherCompetencies);

        $otherCompetencies->delete();

        return response()->noContent();
    }
}
