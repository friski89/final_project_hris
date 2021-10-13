<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CityRecuite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityRecuiteTest extends TestCase
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
    public function it_gets_city_recuites_list()
    {
        $cityRecuites = CityRecuite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.city-recuites.index'));

        $response->assertOk()->assertSee($cityRecuites[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_city_recuite()
    {
        $data = CityRecuite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.city-recuites.store'), $data);

        $this->assertDatabaseHas('city_recuites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.city-recuites.update', $cityRecuite),
            $data
        );

        $data['id'] = $cityRecuite->id;

        $this->assertDatabaseHas('city_recuites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $response = $this->deleteJson(
            route('api.city-recuites.destroy', $cityRecuite)
        );

        $this->assertDeleted($cityRecuite);

        $response->assertNoContent();
    }
}
