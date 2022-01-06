<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BandPosition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandPositionTest extends TestCase
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
    public function it_gets_band_positions_list()
    {
        $bandPositions = BandPosition::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.band-positions.index'));

        $response->assertOk()->assertSee($bandPositions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_band_position()
    {
        $data = BandPosition::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.band-positions.store'), $data);

        $this->assertDatabaseHas('band_positions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.band-positions.update', $bandPosition),
            $data
        );

        $data['id'] = $bandPosition->id;

        $this->assertDatabaseHas('band_positions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $response = $this->deleteJson(
            route('api.band-positions.destroy', $bandPosition)
        );

        $this->assertSoftDeleted($bandPosition);

        $response->assertNoContent();
    }
}
