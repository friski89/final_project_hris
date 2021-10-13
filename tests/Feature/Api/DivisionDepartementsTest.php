<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Division;
use App\Models\Departement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DivisionDepartementsTest extends TestCase
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
    public function it_gets_division_departements()
    {
        $division = Division::factory()->create();
        $departements = Departement::factory()
            ->count(2)
            ->create([
                'division_id' => $division->id,
            ]);

        $response = $this->getJson(
            route('api.divisions.departements.index', $division)
        );

        $response->assertOk()->assertSee($departements[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_division_departements()
    {
        $division = Division::factory()->create();
        $data = Departement::factory()
            ->make([
                'division_id' => $division->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.divisions.departements.store', $division),
            $data
        );

        $this->assertDatabaseHas('departements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $departement = Departement::latest('id')->first();

        $this->assertEquals($division->id, $departement->division_id);
    }
}
