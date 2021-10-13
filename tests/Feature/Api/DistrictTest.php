<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\District;

use App\Models\Regencie;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DistrictTest extends TestCase
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
    public function it_gets_districts_list()
    {
        $districts = District::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.districts.index'));

        $response->assertOk()->assertSee($districts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_district()
    {
        $data = District::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.districts.store'), $data);

        $this->assertDatabaseHas('districts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_district()
    {
        $district = District::factory()->create();

        $regencie = Regencie::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'regencie_id' => $regencie->id,
        ];

        $response = $this->putJson(
            route('api.districts.update', $district),
            $data
        );

        $data['id'] = $district->id;

        $this->assertDatabaseHas('districts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_district()
    {
        $district = District::factory()->create();

        $response = $this->deleteJson(
            route('api.districts.destroy', $district)
        );

        $this->assertSoftDeleted($district);

        $response->assertNoContent();
    }
}
