<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AlamatKerja;
use App\Models\WorkLocation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkLocationAlamatKerjasTest extends TestCase
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
    public function it_gets_work_location_alamat_kerjas()
    {
        $workLocation = WorkLocation::factory()->create();
        $alamatKerjas = AlamatKerja::factory()
            ->count(2)
            ->create([
                'work_location_id' => $workLocation->id,
            ]);

        $response = $this->getJson(
            route('api.work-locations.alamat-kerjas.index', $workLocation)
        );

        $response->assertOk()->assertSee($alamatKerjas[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_work_location_alamat_kerjas()
    {
        $workLocation = WorkLocation::factory()->create();
        $data = AlamatKerja::factory()
            ->make([
                'work_location_id' => $workLocation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.work-locations.alamat-kerjas.store', $workLocation),
            $data
        );

        $this->assertDatabaseHas('alamat_kerjas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $alamatKerja = AlamatKerja::latest('id')->first();

        $this->assertEquals($workLocation->id, $alamatKerja->work_location_id);
    }
}
