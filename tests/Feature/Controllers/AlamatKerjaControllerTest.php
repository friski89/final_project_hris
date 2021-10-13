<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AlamatKerja;

use App\Models\WorkLocation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlamatKerjaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_alamat_kerjas()
    {
        $alamatKerjas = AlamatKerja::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('alamat-kerjas.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.alamat_kerjas.index')
            ->assertViewHas('alamatKerjas');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_alamat_kerja()
    {
        $response = $this->get(route('alamat-kerjas.create'));

        $response->assertOk()->assertViewIs('app.alamat_kerjas.create');
    }

    /**
     * @test
     */
    public function it_stores_the_alamat_kerja()
    {
        $data = AlamatKerja::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('alamat-kerjas.store'), $data);

        $this->assertDatabaseHas('alamat_kerjas', $data);

        $alamatKerja = AlamatKerja::latest('id')->first();

        $response->assertRedirect(route('alamat-kerjas.edit', $alamatKerja));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_alamat_kerja()
    {
        $alamatKerja = AlamatKerja::factory()->create();

        $response = $this->get(route('alamat-kerjas.show', $alamatKerja));

        $response
            ->assertOk()
            ->assertViewIs('app.alamat_kerjas.show')
            ->assertViewHas('alamatKerja');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_alamat_kerja()
    {
        $alamatKerja = AlamatKerja::factory()->create();

        $response = $this->get(route('alamat-kerjas.edit', $alamatKerja));

        $response
            ->assertOk()
            ->assertViewIs('app.alamat_kerjas.edit')
            ->assertViewHas('alamatKerja');
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

        $response = $this->put(
            route('alamat-kerjas.update', $alamatKerja),
            $data
        );

        $data['id'] = $alamatKerja->id;

        $this->assertDatabaseHas('alamat_kerjas', $data);

        $response->assertRedirect(route('alamat-kerjas.edit', $alamatKerja));
    }

    /**
     * @test
     */
    public function it_deletes_the_alamat_kerja()
    {
        $alamatKerja = AlamatKerja::factory()->create();

        $response = $this->delete(route('alamat-kerjas.destroy', $alamatKerja));

        $response->assertRedirect(route('alamat-kerjas.index'));

        $this->assertSoftDeleted($alamatKerja);
    }
}
