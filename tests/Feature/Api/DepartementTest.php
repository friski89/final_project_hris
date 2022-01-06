<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Departement;

use App\Models\Division;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartementTest extends TestCase
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
    public function it_gets_departements_list()
    {
        $departements = Departement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.departements.index'));

        $response->assertOk()->assertSee($departements[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_departement()
    {
        $data = Departement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.departements.store'), $data);

        $this->assertDatabaseHas('departements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_departement()
    {
        $departement = Departement::factory()->create();

        $division = Division::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'division_id' => $division->id,
        ];

        $response = $this->putJson(
            route('api.departements.update', $departement),
            $data
        );

        $data['id'] = $departement->id;

        $this->assertDatabaseHas('departements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_departement()
    {
        $departement = Departement::factory()->create();

        $response = $this->deleteJson(
            route('api.departements.destroy', $departement)
        );

        $this->assertSoftDeleted($departement);

        $response->assertNoContent();
    }
}
