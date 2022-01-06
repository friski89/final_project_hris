<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Village;

use App\Models\District;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VillageControllerTest extends TestCase
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
    public function it_displays_index_view_with_villages()
    {
        $villages = Village::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('villages.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.villages.index')
            ->assertViewHas('villages');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_village()
    {
        $response = $this->get(route('villages.create'));

        $response->assertOk()->assertViewIs('app.villages.create');
    }

    /**
     * @test
     */
    public function it_stores_the_village()
    {
        $data = Village::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('villages.store'), $data);

        $this->assertDatabaseHas('villages', $data);

        $village = Village::latest('id')->first();

        $response->assertRedirect(route('villages.edit', $village));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_village()
    {
        $village = Village::factory()->create();

        $response = $this->get(route('villages.show', $village));

        $response
            ->assertOk()
            ->assertViewIs('app.villages.show')
            ->assertViewHas('village');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_village()
    {
        $village = Village::factory()->create();

        $response = $this->get(route('villages.edit', $village));

        $response
            ->assertOk()
            ->assertViewIs('app.villages.edit')
            ->assertViewHas('village');
    }

    /**
     * @test
     */
    public function it_updates_the_village()
    {
        $village = Village::factory()->create();

        $district = District::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'kode_pos' => $this->faker->text(255),
            'district_id' => $district->id,
        ];

        $response = $this->put(route('villages.update', $village), $data);

        $data['id'] = $village->id;

        $this->assertDatabaseHas('villages', $data);

        $response->assertRedirect(route('villages.edit', $village));
    }

    /**
     * @test
     */
    public function it_deletes_the_village()
    {
        $village = Village::factory()->create();

        $response = $this->delete(route('villages.destroy', $village));

        $response->assertRedirect(route('villages.index'));

        $this->assertSoftDeleted($village);
    }
}
