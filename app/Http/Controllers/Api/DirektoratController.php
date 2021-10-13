<?php

namespace App\Http\Controllers\Api;

use App\Models\Direktorat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DirektoratResource;
use App\Http\Resources\DirektoratCollection;
use App\Http\Requests\DirektoratStoreRequest;
use App\Http\Requests\DirektoratUpdateRequest;

class DirektoratController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Direktorat::class);

        $search = $request->get('search', '');

        $direktorats = Direktorat::search($search)
            ->latest()
            ->paginate();

        return new DirektoratCollection($direktorats);
    }

    /**
     * @param \App\Http\Requests\DirektoratStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirektoratStoreRequest $request)
    {
        $this->authorize('create', Direktorat::class);

        $validated = $request->validated();

        $direktorat = Direktorat::create($validated);

        return new DirektoratResource($direktorat);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Direktorat $direktorat)
    {
        $this->authorize('view', $direktorat);

        return new DirektoratResource($direktorat);
    }

    /**
     * @param \App\Http\Requests\DirektoratUpdateRequest $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function update(
        DirektoratUpdateRequest $request,
        Direktorat $direktorat
    ) {
        $this->authorize('update', $direktorat);

        $validated = $request->validated();

        $direktorat->update($validated);

        return new DirektoratResource($direktorat);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Direktorat $direktorat)
    {
        $this->authorize('delete', $direktorat);

        $direktorat->delete();

        return response()->noContent();
    }
}
