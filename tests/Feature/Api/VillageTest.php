<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Village;

use App\Models\District;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VillageTest extends TestCase
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
    public function it_gets_villages_list()
    {
        $villages = Village::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.villages.index'));

        $response->assertOk()->assertSee($villages[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_village()
    {
        $data = Village::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.villages.store'), $data);

        $this->assertDatabaseHas('villages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_village()
    {
        $village = Village::factory()->create();

        $district = District::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'kode_pos' => $this->faker->text(255),
            'district_id' => $district->id,
        ];

        $response = $this->putJson(
            route('api.villages.update', $village),
            $data
        );

        $data['id'] = $village->id;

        $this->assertDatabaseHas('villages', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_village()
    {
        $village = Village::factory()->create();

        $response = $this->deleteJson(route('api.villages.destroy', $village));

        $this->assertSoftDeleted($village);

        $response->assertNoContent();
    }
}
