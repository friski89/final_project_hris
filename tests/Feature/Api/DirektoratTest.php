<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Direktorat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirektoratTest extends TestCase
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
    public function it_gets_direktorats_list()
    {
        $direktorats = Direktorat::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.direktorats.index'));

        $response->assertOk()->assertSee($direktorats[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_direktorat()
    {
        $data = Direktorat::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.direktorats.store'), $data);

        $this->assertDatabaseHas('direktorats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_direktorat()
    {
        $direktorat = Direktorat::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.direktorats.update', $direktorat),
            $data
        );

        $data['id'] = $direktorat->id;

        $this->assertDatabaseHas('direktorats', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_direktorat()
    {
        $direktorat = Direktorat::factory()->create();

        $response = $this->deleteJson(
            route('api.direktorats.destroy', $direktorat)
        );

        $this->assertSoftDeleted($direktorat);

        $response->assertNoContent();
    }
}
