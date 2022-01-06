<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Unit;

use App\Models\Departement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitTest extends TestCase
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
    public function it_gets_units_list()
    {
        $units = Unit::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.units.index'));

        $response->assertOk()->assertSee($units[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_unit()
    {
        $data = Unit::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.units.store'), $data);

        $this->assertDatabaseHas('units', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_unit()
    {
        $unit = Unit::factory()->create();

        $departement = Departement::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'departement_id' => $departement->id,
        ];

        $response = $this->putJson(route('api.units.update', $unit), $data);

        $data['id'] = $unit->id;

        $this->assertDatabaseHas('units', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->deleteJson(route('api.units.destroy', $unit));

        $this->assertSoftDeleted($unit);

        $response->assertNoContent();
    }
}
