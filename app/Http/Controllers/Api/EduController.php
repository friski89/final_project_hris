<?php

namespace App\Http\Controllers\Api;

use App\Models\Edu;
use Illuminate\Http\Request;
use App\Http\Resources\EduResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\EduCollection;
use App\Http\Requests\EduStoreRequest;
use App\Http\Requests\EduUpdateRequest;

class EduController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Edu::class);

        $search = $request->get('search', '');

        $edus = Edu::search($search)
            ->latest()
            ->paginate();

        return new EduCollection($edus);
    }

    /**
     * @param \App\Http\Requests\EduStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EduStoreRequest $request)
    {
        $this->authorize('create', Edu::class);

        $validated = $request->validated();

        $edu = Edu::create($validated);

        return new EduResource($edu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Edu $edu)
    {
        $this->authorize('view', $edu);

        return new EduResource($edu);
    }

    /**
     * @param \App\Http\Requests\EduUpdateRequest $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function update(EduUpdateRequest $request, Edu $edu)
    {
        $this->authorize('update', $edu);

        $validated = $request->validated();

        $edu->update($validated);

        return new EduResource($edu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Edu $edu)
    {
        $this->authorize('delete', $edu);

        $edu->delete();

        return response()->noContent();
    }
}
