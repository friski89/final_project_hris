<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AlamatKerja;

use App\Models\WorkLocation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlamatKerjaTest extends TestCase
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
    public function it_gets_alamat_kerjas_list()
    {
        $alamatKerjas = AlamatKerja::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.alamat-kerjas.index'));

        $response->assertOk()->assertSee($alamatKerjas[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_alamat_kerja()
    {
        $data = AlamatKerja::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.alamat-kerjas.store'), $data);

        $this->assertDatabaseHas('alamat_kerjas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_alamat_kerja()
    {
        $alamatKerja = AlamatKerja::factory()->create();

        $workLocation = WorkLocation::factory()->create();

        $data = [
            'name' => $this->faker->text,
            'work_location_id' => $workLocation->id,
        ];

        $response = $this->putJson(
            route('api.alamat-kerjas.update', $alamatKerja),
            $data
        );

        $data['id'] = $alamatKerja->id;

        $this->assertDatabaseHas('alamat_kerjas', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_alamat_kerja()
    {
        $alamatKerja = AlamatKerja::factory()->create();

        $response = $this->deleteJson(
            route('api.alamat-kerjas.destroy', $alamatKerja)
        );

        $this->assertSoftDeleted($alamatKerja);

        $response->assertNoContent();
    }
}
