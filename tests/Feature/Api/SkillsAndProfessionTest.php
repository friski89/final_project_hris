<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SkillsAndProfession;

use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillsAndProfessionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_skills_and_professions_list()
    {
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.skills-and-professions.index'));

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_skills_and_profession()
    {
        $data = SkillsAndProfession::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.skills-and-professions.store'),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.skills-and-professions.update', $skillsAndProfession),
            $data
        );

        $data['id'] = $skillsAndProfession->id;

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_skills_and_profession()
    {
        $skillsAndProfession = SkillsAndProfession::factory()->create();

        $response = $this->deleteJson(
            route('api.skills-and-professions.destroy', $skillsAndProfession)
        );

        $this->assertSoftDeleted($skillsAndProfession);

        $response->assertNoContent();
    }
}
