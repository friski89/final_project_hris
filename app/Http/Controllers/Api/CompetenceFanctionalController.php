<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetenceFanctional;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenceFanctionalResource;
use App\Http\Resources\CompetenceFanctionalCollection;
use App\Http\Requests\CompetenceFanctionalStoreRequest;
use App\Http\Requests\CompetenceFanctionalUpdateRequest;

class CompetenceFanctionalController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompetenceFanctional::class);

        $search = $request->get('search', '');

        $competenceFanctionals = CompetenceFanctional::search($search)
            ->latest()
            ->paginate();

        return new CompetenceFanctionalCollection($competenceFanctionals);
    }

    /**
     * @param \App\Http\Requests\CompetenceFanctionalStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceFanctionalStoreRequest $request)
    {
        $this->authorize('create', CompetenceFanctional::class);

        $validated = $request->validated();

        $competenceFanctional = CompetenceFanctional::create($validated);

        return new CompetenceFanctionalResource($competenceFanctional);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('view', $competenceFanctional);

        return new CompetenceFanctionalResource($competenceFanctional);
    }

    /**
     * @param \App\Http\Requests\CompetenceFanctionalUpdateRequest $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompetenceFanctionalUpdateRequest $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('update', $competenceFanctional);

        $validated = $request->validated();

        $competenceFanctional->update($validated);

        return new CompetenceFanctionalResource($competenceFanctional);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('delete', $competenceFanctional);

        $competenceFanctional->delete();

        return response()->noContent();
    }
}
