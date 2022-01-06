<?php

namespace App\Http\Controllers\Api;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JabatanResource;
use App\Http\Resources\JabatanCollection;
use App\Http\Requests\JabatanStoreRequest;
use App\Http\Requests\JabatanUpdateRequest;

class JabatanController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Jabatan::class);

        $search = $request->get('search', '');

        $jabatans = Jabatan::search($search)
            ->latest()
            ->paginate();

        return new JabatanCollection($jabatans);
    }

    /**
     * @param \App\Http\Requests\JabatanStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanStoreRequest $request)
    {
        $this->authorize('create', Jabatan::class);

        $validated = $request->validated();

        $jabatan = Jabatan::create($validated);

        return new JabatanResource($jabatan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Jabatan $jabatan)
    {
        $this->authorize('view', $jabatan);

        return new JabatanResource($jabatan);
    }

    /**
     * @param \App\Http\Requests\JabatanUpdateRequest $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanUpdateRequest $request, Jabatan $jabatan)
    {
        $this->authorize('update', $jabatan);

        $validated = $request->validated();

        $jabatan->update($validated);

        return new JabatanResource($jabatan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jabatan $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Jabatan $jabatan)
    {
        $this->authorize('delete', $jabatan);

        $jabatan->delete();

        return response()->noContent();
    }
}
