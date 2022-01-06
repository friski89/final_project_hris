<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\District;

use App\Models\Regencie;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DistrictControllerTest extends TestCase
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
    public function it_displays_index_view_with_districts()
    {
        $districts = District::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('districts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.districts.index')
            ->assertViewHas('districts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_district()
    {
        $response = $this->get(route('districts.create'));

        $response->assertOk()->assertViewIs('app.districts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_district()
    {
        $data = District::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('districts.store'), $data);

        $this->assertDatabaseHas('districts', $data);

        $district = District::latest('id')->first();

        $response->assertRedirect(route('districts.edit', $district));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_district()
    {
        $district = District::factory()->create();

        $response = $this->get(route('districts.show', $district));

        $response
            ->assertOk()
            ->assertViewIs('app.districts.show')
            ->assertViewHas('district');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_district()
    {
        $district = District::factory()->create();

        $response = $this->get(route('districts.edit', $district));

        $response
            ->assertOk()
            ->assertViewIs('app.districts.edit')
            ->assertViewHas('district');
    }

    /**
     * @test
     */
    public function it_updates_the_district()
    {
        $district = District::factory()->create();

        $regencie = Regencie::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'regencie_id' => $regencie->id,
        ];

        $response = $this->put(route('districts.update', $district), $data);

        $data['id'] = $district->id;

        $this->assertDatabaseHas('districts', $data);

        $response->assertRedirect(route('districts.edit', $district));
    }

    /**
     * @test
     */
    public function it_deletes_the_district()
    {
        $district = District::factory()->create();

        $response = $this->delete(route('districts.destroy', $district));

        $response->assertRedirect(route('districts.index'));

        $this->assertSoftDeleted($district);
    }
}
