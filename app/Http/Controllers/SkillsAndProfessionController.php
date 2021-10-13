<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OtherCompetencies;
use App\Models\SkillsAndProfession;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;
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
            ->paginate(5);

        return view(
            'app.skills_and_professions.index',
            compact('skillsAndProfessions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SkillsAndProfession::class);

        $users = User::pluck('name', 'id');
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');

        return view(
            'app.skills_and_professions.create',
            compact(
                'users',
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
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

        return redirect()
            ->route('skills-and-professions.edit', $skillsAndProfession)
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.skills_and_professions.show',
            compact('skillsAndProfession')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SkillsAndProfession $skillsAndProfession
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        SkillsAndProfession $skillsAndProfession
    ) {
        $this->authorize('update', $skillsAndProfession);

        $users = User::pluck('name', 'id');
        $allOtherCompetencies = OtherCompetencies::pluck('name', 'id');
        $competenceFanctionals = CompetenceFanctional::pluck('name', 'id');
        $competenceLeaderships = CompetenceLeadership::pluck('name', 'id');
        $competenceCoreValues = CompetenceCoreValue::pluck('name', 'id');

        return view(
            'app.skills_and_professions.edit',
            compact(
                'skillsAndProfession',
                'users',
                'allOtherCompetencies',
                'competenceFanctionals',
                'competenceLeaderships',
                'competenceCoreValues'
            )
        );
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

        return redirect()
            ->route('skills-and-professions.edit', $skillsAndProfession)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('skills-and-professions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
