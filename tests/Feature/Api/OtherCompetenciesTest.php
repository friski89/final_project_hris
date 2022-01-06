<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OtherCompetencies;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCompetenciesTest extends TestCase
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
    public function it_gets_all_other_competencies_list()
    {
        $allOtherCompetencies = OtherCompetencies::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-other-competencies.index'));

        $response->assertOk()->assertSee($allOtherCompetencies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_other_competencies()
    {
        $data = OtherCompetencies::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-other-competencies.store'),
            $data
        );

        $this->assertDatabaseHas('other_competencies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.all-other-competencies.update', $otherCompetencies),
            $data
        );

        $data['id'] = $otherCompetencies->id;

        $this->assertDatabaseHas('other_competencies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $response = $this->deleteJson(
            route('api.all-other-competencies.destroy', $otherCompetencies)
        );

        $this->assertSoftDeleted($otherCompetencies);

        $response->assertNoContent();
    }
}
