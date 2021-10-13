<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationalBackground;
use App\Http\Resources\EducationalBackgroundResource;
use App\Http\Resources\EducationalBackgroundCollection;
use App\Http\Requests\EducationalBackgroundStoreRequest;
use App\Http\Requests\EducationalBackgroundUpdateRequest;

class EducationalBackgroundController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EducationalBackground::class);

        $search = $request->get('search', '');

        $educationalBackgrounds = EducationalBackground::search($search)
            ->latest()
            ->paginate();

        return new EducationalBackgroundCollection($educationalBackgrounds);
    }

    /**
     * @param \App\Http\Requests\EducationalBackgroundStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationalBackgroundStoreRequest $request)
    {
        $this->authorize('create', EducationalBackground::class);

        $validated = $request->validated();

        $educationalBackground = EducationalBackground::create($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('view', $educationalBackground);

        return new EducationalBackgroundResource($educationalBackground);
    }

    /**
     * @param \App\Http\Requests\EducationalBackgroundUpdateRequest $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function update(
        EducationalBackgroundUpdateRequest $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('update', $educationalBackground);

        $validated = $request->validated();

        $educationalBackground->update($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('delete', $educationalBackground);

        $educationalBackground->delete();

        return response()->noContent();
    }
}
