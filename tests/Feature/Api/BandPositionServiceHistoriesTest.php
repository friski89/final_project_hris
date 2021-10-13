<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BandPosition;
use App\Models\ServiceHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandPositionServiceHistoriesTest extends TestCase
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
    public function it_gets_band_position_service_histories()
    {
        $bandPosition = BandPosition::factory()->create();
        $serviceHistories = ServiceHistory::factory()
            ->count(2)
            ->create([
                'band_position_id' => $bandPosition->id,
            ]);

        $response = $this->getJson(
            route('api.band-positions.service-histories.index', $bandPosition)
        );

        $response->assertOk()->assertSee($serviceHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_band_position_service_histories()
    {
        $bandPosition = BandPosition::factory()->create();
        $data = ServiceHistory::factory()
            ->make([
                'band_position_id' => $bandPosition->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.band-positions.service-histories.store', $bandPosition),
            $data
        );

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $serviceHistory = ServiceHistory::latest('id')->first();

        $this->assertEquals(
            $bandPosition->id,
            $serviceHistory->band_position_id
        );
    }
}
