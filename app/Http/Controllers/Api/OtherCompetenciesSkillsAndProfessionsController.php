<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\OtherCompetencies;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillsAndProfessionResource;
use App\Http\Resources\SkillsAndProfessionCollection;

class OtherCompetenciesSkillsAndProfessionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('view', $otherCompetencies);

        $search = $request->get('search', '');

        $skillsAndProfessions = $otherCompetencies
            ->skillsAndProfessions()
            ->search($search)
            ->latest()
            ->paginate();

        return new SkillsAndProfessionCollection($skillsAndProfessions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('create', SkillsAndProfession::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'certificate_name' => ['required', 'max:255', 'string'],
            'institution' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'competence_fanctional_id' => [
                'nullable',
                'exists:competence_fanctionals,id',
            ],
            'competence_leadership_id' => [
                'nullable',
                'exists:competence_leaderships,id',
            ],
            'competence_core_value_id' => [
                'nullable',
                'exists:competence_core_values,id',
            ],
        ]);

        $skillsAndProfession = $otherCompetencies
            ->skillsAndProfessions()
            ->create($validated);

        return new SkillsAndProfessionResource($skillsAndProfession);
    }
}
