<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetenceCoreValue;
use App\Models\SkillsAndProfession;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceCoreValueSkillsAndProfessionsTest extends TestCase
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
    public function it_gets_competence_core_value_skills_and_professions()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(2)
            ->create([
                'competence_core_value_id' => $competenceCoreValue->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-core-values.skills-and-professions.index',
                $competenceCoreValue
            )
        );

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_core_value_skills_and_professions()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();
        $data = SkillsAndProfession::factory()
            ->make([
                'competence_core_value_id' => $competenceCoreValue->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-core-values.skills-and-professions.store',
                $competenceCoreValue
            ),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $this->assertEquals(
            $competenceCoreValue->id,
            $skillsAndProfession->competence_core_value_id
        );
    }
}
