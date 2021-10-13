<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SkillsAndProfession;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSkillsAndProfessionsTest extends TestCase
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
    public function it_gets_user_skills_and_professions()
    {
        $user = User::factory()->create();
        $skillsAndProfessions = SkillsAndProfession::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.skills-and-professions.index', $user)
        );

        $response->assertOk()->assertSee($skillsAndProfessions[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_skills_and_professions()
    {
        $user = User::factory()->create();
        $data = SkillsAndProfession::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.skills-and-professions.store', $user),
            $data
        );

        $this->assertDatabaseHas('skills_and_professions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $skillsAndProfession = SkillsAndProfession::latest('id')->first();

        $this->assertEquals($user->id, $skillsAndProfession->user_id);
    }
}
