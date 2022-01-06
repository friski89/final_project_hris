<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SkillsAndProfession;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillsAndProfessionResource;
use App\Http\Resources\SkillsAndProfessionCollection;
use App\Http\Requests\SkillsAndProfessionStoreRequest;
use App\Http\Requests\SkillsAndProfessionUpdateRequest;

class SkillsAndProfessionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SkillsAndProfession::class);

        $search = $request->get('search', '');

        $skillsAndProfessions = SkillsAndProfession::search($search)
            ->latest()
            ->paginate();

        return new SkillsAndProfessionCollection($skillsAndProfessions);
    }

    /**
     * @param \App\Http\Requests\SkillsAndProfessionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillsAndProfessionStoreRequest $request)
    {
        $this->authorize('create', SkillsAndProfession::class);

        $validated = $request->validated();

        $skillsAndProfession = SkillsAndProfession::create($validated);

        return new SkillsAndProfessionResource($skillsAndProfession);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SkillsAndProfession $skillsAndProfession
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        SkillsAndProfession $skillsAndProfession
    ) {
        $this->authorize('view', $skillsAndProfession);

        return new SkillsAndProfessionResource($skillsAndProfession);
    }

    /**
     * @param \App\Http\Requests\SkillsAndProfessionUpdateRequest $request
     * @param \App\Models\SkillsAndProfession $skillsAndProfession
     * @return \Illuminate\Http\Response
     */
    public function update(
        SkillsAndProfessionUpdateRequest $request,
        SkillsAndProfession $skillsAndProfession
    ) {
        $this->authorize('update', $skillsAndProfession);

        $validated = $request->validated();

        $skillsAndProfession->update($validated);

        return new SkillsAndProfessionResource($skillsAndProfession);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SkillsAndProfession $skillsAndProfession
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        SkillsAndProfession $skillsAndProfession
    ) {
        $this->authorize('delete', $skillsAndProfession);

        $skillsAndProfession->delete();

        return response()->noContent();
    }
}
