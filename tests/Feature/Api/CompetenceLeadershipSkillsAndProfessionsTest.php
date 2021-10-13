<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SkillsAndProfession;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceLeadershipSkillsAndProfessionsTest extends TestCase
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
    public function it_gets_competence_leadership_skills_and_professions()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(2)
            ->create([
                'competence_leadership_id' => $competenceLeadership->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-leaderships.skills-and-professions.index',
                $competenceLeadership
            )
        );

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_leadership_skills_and_professions()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $data = SkillsAndProfession::factory()
            ->make([
                'competence_leadership_id' => $competenceLeadership->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-leaderships.skills-and-professions.store',
                $competenceLeadership
            ),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $this->assertEquals(
            $competenceLeadership->id,
            $skillsAndProfession->competence_leadership_id
        );
    }
}
