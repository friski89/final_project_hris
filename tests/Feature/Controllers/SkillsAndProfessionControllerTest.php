<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SkillsAndProfession;

use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillsAndProfessionControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_skills_and_professions()
    {
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('skills-and-professions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.skills_and_professions.index')
            ->assertViewHas('skillsAndProfessions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_skills_and_profession()
    {
        $response = $this->get(route('skills-and-professions.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.skills_and_professions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_skills_and_profession()
    {
        $data = SkillsAndProfession::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('skills-and-professions.store'), $data);

        $this->assertDatabaseHas('skills_and_professions', $data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $response->assertRedirect(
            route('skills-and-professions.edit', $skillsAndProfession)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_skills_and_profession()
    {
        $skillsAndProfession = SkillsAndProfession::factory()->create();

        $response = $this->get(
            route('skills-and-professions.show', $skillsAndProfession)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.skills_and_professions.show')
            ->assertViewHas('skillsAndProfession');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_skills_and_profession()
    {
        $skillsAndProfession = SkillsAndProfession::factory()->create();

        $response = $this->get(
            route('skills-and-professions.edit', $skillsAndProfession)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.skills_and_professions.edit')
            ->assertViewHas('skillsAndProfession');
    }

    /**
     * @test
     */
    public function it_updates_the_skills_and_profession()
    {
        $skillsAndProfession = SkillsAndProfession::factory()->create();

        $user = User::factory()->create();
        $otherCompetencies = OtherCompetencies::factory()->create();
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'certificate_name' => $this->faker->text(255),
            'institution' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'user_id' => $user->id,
            'other_competencies_id' => $otherCompetencies->id,
            'competence_fanctional_id' => $competenceFanctional->id,
            'competence_leadership_id' => $competenceLeadership->id,
            'competence_core_value_id' => $competenceCoreValue->id,
        ];

        $response = $this->put(
            route('skills-and-professions.update', $skillsAndProfession),
            $data
        );

        $data['id'] = $skillsAndProfession->id;

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertRedirect(
            route('skills-and-professions.edit', $skillsAndProfession)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_skills_and_profession()
    {
        $skillsAndProfession = SkillsAndProfession::factory()->create();

        $response = $this->delete(
            route('skills-and-professions.destroy', $skillsAndProfession)
        );

        $response->assertRedirect(route('skills-and-professions.index'));

        $this->assertSoftDeleted($skillsAndProfession);
    }
}
