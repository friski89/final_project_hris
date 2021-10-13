<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\WorkLocation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkLocationTest extends TestCase
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
    public function it_gets_work_locations_list()
    {
        $workLocations = WorkLocation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.work-locations.index'));

        $response->assertOk()->assertSee($workLocations[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_work_location()
    {
        $data = WorkLocation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.work-locations.store'), $data);

        $this->assertDatabaseHas('work_locations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.work-locations.update', $workLocation),
            $data
        );

        $data['id'] = $workLocation->id;

        $this->assertDatabaseHas('work_locations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $response = $this->deleteJson(
            route('api.work-locations.destroy', $workLocation)
        );

        $this->assertSoftDeleted($workLocation);

        $response->assertNoContent();
    }
}
