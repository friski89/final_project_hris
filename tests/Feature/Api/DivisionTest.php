<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Division;

use App\Models\Direktorat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DivisionTest extends TestCase
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
    public function it_gets_divisions_list()
    {
        $divisions = Division::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.divisions.index'));

        $response->assertOk()->assertSee($divisions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_division()
    {
        $data = Division::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.divisions.store'), $data);

        $this->assertDatabaseHas('divisions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_division()
    {
        $division = Division::factory()->create();

        $direktorat = Direktorat::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'direktorat_id' => $direktorat->id,
        ];

        $response = $this->putJson(
            route('api.divisions.update', $division),
            $data
        );

        $data['id'] = $division->id;

        $this->assertDatabaseHas('divisions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_division()
    {
        $division = Division::factory()->create();

        $response = $this->deleteJson(
            route('api.divisions.destroy', $division)
        );

        $this->assertSoftDeleted($division);

        $response->assertNoContent();
    }
}
