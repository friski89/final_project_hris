<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Unit;
use App\Models\Departement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartementUnitsTest extends TestCase
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
    public function it_gets_departement_units()
    {
        $departement = Departement::factory()->create();
        $units = Unit::factory()
            ->count(2)
            ->create([
                'departement_id' => $departement->id,
            ]);

        $response = $this->getJson(
            route('api.departements.units.index', $departement)
        );

        $response->assertOk()->assertSee($units[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_departement_units()
    {
        $departement = Departement::factory()->create();
        $data = Unit::factory()
            ->make([
                'departement_id' => $departement->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.departements.units.store', $departement),
            $data
        );

        $this->assertDatabaseHas('units', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $unit = Unit::latest('id')->first();

        $this->assertEquals($departement->id, $unit->departement_id);
    }
}
