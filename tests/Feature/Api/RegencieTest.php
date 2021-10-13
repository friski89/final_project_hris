<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Regencie;

use App\Models\Province;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegencieTest extends TestCase
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
    public function it_gets_regencies_list()
    {
        $regencies = Regencie::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.regencies.index'));

        $response->assertOk()->assertSee($regencies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_regencie()
    {
        $data = Regencie::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.regencies.store'), $data);

        $this->assertDatabaseHas('regencies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_regencie()
    {
        $regencie = Regencie::factory()->create();

        $province = Province::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'province_id' => $province->id,
        ];

        $response = $this->putJson(
            route('api.regencies.update', $regencie),
            $data
        );

        $data['id'] = $regencie->id;

        $this->assertDatabaseHas('regencies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_regencie()
    {
        $regencie = Regencie::factory()->create();

        $response = $this->deleteJson(
            route('api.regencies.destroy', $regencie)
        );

        $this->assertSoftDeleted($regencie);

        $response->assertNoContent();
    }
}
