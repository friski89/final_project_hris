<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Village;
use App\Models\District;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DistrictVillagesTest extends TestCase
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
    public function it_gets_district_villages()
    {
        $district = District::factory()->create();
        $villages = Village::factory()
            ->count(2)
            ->create([
                'district_id' => $district->id,
            ]);

        $response = $this->getJson(
            route('api.districts.villages.index', $district)
        );

        $response->assertOk()->assertSee($villages[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_district_villages()
    {
        $district = District::factory()->create();
        $data = Village::factory()
            ->make([
                'district_id' => $district->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.districts.villages.store', $district),
            $data
        );

        $this->assertDatabaseHas('villages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $village = Village::latest('id')->first();

        $this->assertEquals($district->id, $village->district_id);
    }
}
