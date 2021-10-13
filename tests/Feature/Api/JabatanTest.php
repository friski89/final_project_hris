<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Jabatan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JabatanTest extends TestCase
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
    public function it_gets_jabatans_list()
    {
        $jabatans = Jabatan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.jabatans.index'));

        $response->assertOk()->assertSee($jabatans[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_jabatan()
    {
        $data = Jabatan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.jabatans.store'), $data);

        $this->assertDatabaseHas('jabatans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.jabatans.update', $jabatan),
            $data
        );

        $data['id'] = $jabatan->id;

        $this->assertDatabaseHas('jabatans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->deleteJson(route('api.jabatans.destroy', $jabatan));

        $this->assertSoftDeleted($jabatan);

        $response->assertNoContent();
    }
}
