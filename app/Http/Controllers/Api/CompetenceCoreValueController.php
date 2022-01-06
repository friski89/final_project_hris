<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetenceCoreValue;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenceCoreValueResource;
use App\Http\Resources\CompetenceCoreValueCollection;
use App\Http\Requests\CompetenceCoreValueStoreRequest;
use App\Http\Requests\CompetenceCoreValueUpdateRequest;

class CompetenceCoreValueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompetenceCoreValue::class);

        $search = $request->get('search', '');

        $competenceCoreValues = CompetenceCoreValue::search($search)
            ->latest()
            ->paginate();

        return new CompetenceCoreValueCollection($competenceCoreValues);
    }

    /**
     * @param \App\Http\Requests\CompetenceCoreValueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceCoreValueStoreRequest $request)
    {
        $this->authorize('create', CompetenceCoreValue::class);

        $validated = $request->validated();

        $competenceCoreValue = CompetenceCoreValue::create($validated);

        return new CompetenceCoreValueResource($competenceCoreValue);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('view', $competenceCoreValue);

        return new CompetenceCoreValueResource($competenceCoreValue);
    }

    /**
     * @param \App\Http\Requests\CompetenceCoreValueUpdateRequest $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompetenceCoreValueUpdateRequest $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('update', $competenceCoreValue);

        $validated = $request->validated();

        $competenceCoreValue->update($validated);

        return new CompetenceCoreValueResource($competenceCoreValue);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('delete', $competenceCoreValue);

        $competenceCoreValue->delete();

        return response()->noContent();
    }
}
