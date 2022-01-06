<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Direktorat;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirektoratControllerTest extends TestCase
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
    public function it_displays_index_view_with_direktorats()
    {
        $direktorats = Direktorat::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('direktorats.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.direktorats.index')
            ->assertViewHas('direktorats');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_direktorat()
    {
        $response = $this->get(route('direktorats.create'));

        $response->assertOk()->assertViewIs('app.direktorats.create');
    }

    /**
     * @test
     */
    public function it_stores_the_direktorat()
    {
        $data = Direktorat::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('direktorats.store'), $data);

        $this->assertDatabaseHas('direktorats', $data);

        $direktorat = Direktorat::latest('id')->first();

        $response->assertRedirect(route('direktorats.edit', $direktorat));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_direktorat()
    {
        $direktorat = Direktorat::factory()->create();

        $response = $this->get(route('direktorats.show', $direktorat));

        $response
            ->assertOk()
            ->assertViewIs('app.direktorats.show')
            ->assertViewHas('direktorat');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_direktorat()
    {
        $direktorat = Direktorat::factory()->create();

        $response = $this->get(route('direktorats.edit', $direktorat));

        $response
            ->assertOk()
            ->assertViewIs('app.direktorats.edit')
            ->assertViewHas('direktorat');
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

        $response = $this->put(route('direktorats.update', $direktorat), $data);

        $data['id'] = $direktorat->id;

        $this->assertDatabaseHas('direktorats', $data);

        $response->assertRedirect(route('direktorats.edit', $direktorat));
    }

    /**
     * @test
     */
    public function it_deletes_the_direktorat()
    {
        $direktorat = Direktorat::factory()->create();

        $response = $this->delete(route('direktorats.destroy', $direktorat));

        $response->assertRedirect(route('direktorats.index'));

        $this->assertSoftDeleted($direktorat);
    }
}
