<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetenceFanctional;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceFanctionalTest extends TestCase
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
    public function it_gets_competence_fanctionals_list()
    {
        $competenceFanctionals = CompetenceFanctional::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competence-fanctionals.index'));

        $response->assertOk()->assertSee($competenceFanctionals[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_fanctional()
    {
        $data = CompetenceFanctional::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.competence-fanctionals.store'),
            $data
        );

        $this->assertDatabaseHas('competence_fanctionals', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.competence-fanctionals.update', $competenceFanctional),
            $data
        );

        $data['id'] = $competenceFanctional->id;

        $this->assertDatabaseHas('competence_fanctionals', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $response = $this->deleteJson(
            route('api.competence-fanctionals.destroy', $competenceFanctional)
        );

        $this->assertSoftDeleted($competenceFanctional);

        $response->assertNoContent();
    }
}
