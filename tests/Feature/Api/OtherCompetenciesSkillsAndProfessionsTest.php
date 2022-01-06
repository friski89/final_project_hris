<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OtherCompetencies;
use App\Models\SkillsAndProfession;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCompetenciesSkillsAndProfessionsTest extends TestCase
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
    public function it_gets_other_competencies_skills_and_professions()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(2)
            ->create([
                'other_competencies_id' => $otherCompetencies->id,
            ]);

        $response = $this->getJson(
            route(
                'api.all-other-competencies.skills-and-professions.index',
                $otherCompetencies
            )
        );

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_other_competencies_skills_and_professions()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();
        $data = SkillsAndProfession::factory()
            ->make([
                'other_competencies_id' => $otherCompetencies->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.all-other-competencies.skills-and-professions.store',
                $otherCompetencies
            ),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $this->assertEquals(
            $otherCompetencies->id,
            $skillsAndProfession->other_competencies_id
        );
    }
}
