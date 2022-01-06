<?php

namespace App\Http\Controllers\Api;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReligionResource;
use App\Http\Resources\ReligionCollection;
use App\Http\Requests\ReligionStoreRequest;
use App\Http\Requests\ReligionUpdateRequest;

class ReligionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Religion::class);

        $search = $request->get('search', '');

        $religions = Religion::search($search)
            ->latest()
            ->paginate();

        return new ReligionCollection($religions);
    }

    /**
     * @param \App\Http\Requests\ReligionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReligionStoreRequest $request)
    {
        $this->authorize('create', Religion::class);

        $validated = $request->validated();

        $religion = Religion::create($validated);

        return new ReligionResource($religion);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Religion $religion)
    {
        $this->authorize('view', $religion);

        return new ReligionResource($religion);
    }

    /**
     * @param \App\Http\Requests\ReligionUpdateRequest $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function update(ReligionUpdateRequest $request, Religion $religion)
    {
        $this->authorize('update', $religion);

        $validated = $request->validated();

        $religion->update($validated);

        return new ReligionResource($religion);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Religion $religion)
    {
        $this->authorize('delete', $religion);

        $religion->delete();

        return response()->noContent();
    }
}
