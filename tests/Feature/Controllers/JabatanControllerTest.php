<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Jabatan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JabatanControllerTest extends TestCase
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
    public function it_displays_index_view_with_jabatans()
    {
        $jabatans = Jabatan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('jabatans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.jabatans.index')
            ->assertViewHas('jabatans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_jabatan()
    {
        $response = $this->get(route('jabatans.create'));

        $response->assertOk()->assertViewIs('app.jabatans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_jabatan()
    {
        $data = Jabatan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('jabatans.store'), $data);

        $this->assertDatabaseHas('jabatans', $data);

        $jabatan = Jabatan::latest('id')->first();

        $response->assertRedirect(route('jabatans.edit', $jabatan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->get(route('jabatans.show', $jabatan));

        $response
            ->assertOk()
            ->assertViewIs('app.jabatans.show')
            ->assertViewHas('jabatan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->get(route('jabatans.edit', $jabatan));

        $response
            ->assertOk()
            ->assertViewIs('app.jabatans.edit')
            ->assertViewHas('jabatan');
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

        $response = $this->put(route('jabatans.update', $jabatan), $data);

        $data['id'] = $jabatan->id;

        $this->assertDatabaseHas('jabatans', $data);

        $response->assertRedirect(route('jabatans.edit', $jabatan));
    }

    /**
     * @test
     */
    public function it_deletes_the_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->delete(route('jabatans.destroy', $jabatan));

        $response->assertRedirect(route('jabatans.index'));

        $this->assertSoftDeleted($jabatan);
    }
}
