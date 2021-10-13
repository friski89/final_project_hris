<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SkillsAndProfession;
use App\Models\CompetenceFanctional;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceFanctionalSkillsAndProfessionsTest extends TestCase
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
    public function it_gets_competence_fanctional_skills_and_professions()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(2)
            ->create([
                'competence_fanctional_id' => $competenceFanctional->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-fanctionals.skills-and-professions.index',
                $competenceFanctional
            )
        );

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_fanctional_skills_and_professions()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $data = SkillsAndProfession::factory()
            ->make([
                'competence_fanctional_id' => $competenceFanctional->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-fanctionals.skills-and-professions.store',
                $competenceFanctional
            ),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $this->assertEquals(
            $competenceFanctional->id,
            $skillsAndProfession->competence_fanctional_id
        );
    }
}
