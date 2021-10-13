<?php

namespace App\Http\Controllers\Api;

use App\Models\DataThp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataThpResource;
use App\Http\Resources\DataThpCollection;
use App\Http\Requests\DataThpStoreRequest;
use App\Http\Requests\DataThpUpdateRequest;

class DataThpController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DataThp::class);

        $search = $request->get('search', '');

        $dataThps = DataThp::search($search)
            ->latest()
            ->paginate();

        return new DataThpCollection($dataThps);
    }

    /**
     * @param \App\Http\Requests\DataThpStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataThpStoreRequest $request)
    {
        $this->authorize('create', DataThp::class);

        $validated = $request->validated();

        $dataThp = DataThp::create($validated);

        return new DataThpResource($dataThp);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataThp $dataThp)
    {
        $this->authorize('view', $dataThp);

        return new DataThpResource($dataThp);
    }

    /**
     * @param \App\Http\Requests\DataThpUpdateRequest $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function update(DataThpUpdateRequest $request, DataThp $dataThp)
    {
        $this->authorize('update', $dataThp);

        $validated = $request->validated();

        $dataThp->update($validated);

        return new DataThpResource($dataThp);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DataThp $dataThp)
    {
        $this->authorize('delete', $dataThp);

        $dataThp->delete();

        return response()->noContent();
    }
}
