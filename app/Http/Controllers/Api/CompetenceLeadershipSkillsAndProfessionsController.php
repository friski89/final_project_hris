<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetenceLeadership;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillsAndProfessionResource;
use App\Http\Resources\SkillsAndProfessionCollection;

class CompetenceLeadershipSkillsAndProfessionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        CompetenceLeadership $competenceLeadership
    ) {
        $this->authorize('view', $competenceLeadership);

        $search = $request->get('search', '');

        $skillsAndProfessions = $competenceLeadership
            ->skillsAndProfessions()
            ->search($search)
            ->latest()
            ->paginate();

        return new SkillsAndProfessionCollection($skillsAndProfessions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        CompetenceLeadership $competenceLeadership
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
            'other_competencies_id' => [
                'nullable',
                'exists:other_competencies,id',
            ],
            'competence_fanctional_id' => [
                'nullable',
                'exists:competence_fanctionals,id',
            ],
            'competence_core_value_id' => [
                'nullable',
                'exists:competence_core_values,id',
            ],
        ]);

        $skillsAndProfession = $competenceLeadership
            ->skillsAndProfessions()
            ->create($validated);

        return new SkillsAndProfessionResource($skillsAndProfession);
    }
}
