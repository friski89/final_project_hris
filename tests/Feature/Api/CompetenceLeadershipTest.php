<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceLeadershipTest extends TestCase
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
    public function it_gets_competence_leaderships_list()
    {
        $competenceLeaderships = CompetenceLeadership::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competence-leaderships.index'));

        $response->assertOk()->assertSee($competenceLeaderships[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_leadership()
    {
        $data = CompetenceLeadership::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.competence-leaderships.store'),
            $data
        );

        $this->assertDatabaseHas('competence_leaderships', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.competence-leaderships.update', $competenceLeadership),
            $data
        );

        $data['id'] = $competenceLeadership->id;

        $this->assertDatabaseHas('competence_leaderships', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $response = $this->deleteJson(
            route('api.competence-leaderships.destroy', $competenceLeadership)
        );

        $this->assertSoftDeleted($competenceLeadership);

        $response->assertNoContent();
    }
}
