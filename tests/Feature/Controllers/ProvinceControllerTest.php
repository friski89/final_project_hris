<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Province;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProvinceControllerTest extends TestCase
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
    public function it_displays_index_view_with_provinces()
    {
        $provinces = Province::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('provinces.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.provinces.index')
            ->assertViewHas('provinces');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_province()
    {
        $response = $this->get(route('provinces.create'));

        $response->assertOk()->assertViewIs('app.provinces.create');
    }

    /**
     * @test
     */
    public function it_stores_the_province()
    {
        $data = Province::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('provinces.store'), $data);

        $this->assertDatabaseHas('provinces', $data);

        $province = Province::latest('id')->first();

        $response->assertRedirect(route('provinces.edit', $province));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_province()
    {
        $province = Province::factory()->create();

        $response = $this->get(route('provinces.show', $province));

        $response
            ->assertOk()
            ->assertViewIs('app.provinces.show')
            ->assertViewHas('province');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_province()
    {
        $province = Province::factory()->create();

        $response = $this->get(route('provinces.edit', $province));

        $response
            ->assertOk()
            ->assertViewIs('app.provinces.edit')
            ->assertViewHas('province');
    }

    /**
     * @test
     */
    public function it_updates_the_province()
    {
        $province = Province::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('provinces.update', $province), $data);

        $data['id'] = $province->id;

        $this->assertDatabaseHas('provinces', $data);

        $response->assertRedirect(route('provinces.edit', $province));
    }

    /**
     * @test
     */
    public function it_deletes_the_province()
    {
        $province = Province::factory()->create();

        $response = $this->delete(route('provinces.destroy', $province));

        $response->assertRedirect(route('provinces.index'));

        $this->assertSoftDeleted($province);
    }
}
