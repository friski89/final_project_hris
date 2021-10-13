<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BandPosition;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandPositionControllerTest extends TestCase
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
    public function it_displays_index_view_with_band_positions()
    {
        $bandPositions = BandPosition::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('band-positions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.band_positions.index')
            ->assertViewHas('bandPositions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_band_position()
    {
        $response = $this->get(route('band-positions.create'));

        $response->assertOk()->assertViewIs('app.band_positions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_band_position()
    {
        $data = BandPosition::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('band-positions.store'), $data);

        $this->assertDatabaseHas('band_positions', $data);

        $bandPosition = BandPosition::latest('id')->first();

        $response->assertRedirect(route('band-positions.edit', $bandPosition));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $response = $this->get(route('band-positions.show', $bandPosition));

        $response
            ->assertOk()
            ->assertViewIs('app.band_positions.show')
            ->assertViewHas('bandPosition');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $response = $this->get(route('band-positions.edit', $bandPosition));

        $response
            ->assertOk()
            ->assertViewIs('app.band_positions.edit')
            ->assertViewHas('bandPosition');
    }

    /**
     * @test
     */
    public function it_updates_the_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('band-positions.update', $bandPosition),
            $data
        );

        $data['id'] = $bandPosition->id;

        $this->assertDatabaseHas('band_positions', $data);

        $response->assertRedirect(route('band-positions.edit', $bandPosition));
    }

    /**
     * @test
     */
    public function it_deletes_the_band_position()
    {
        $bandPosition = BandPosition::factory()->create();

        $response = $this->delete(
            route('band-positions.destroy', $bandPosition)
        );

        $response->assertRedirect(route('band-positions.index'));

        $this->assertSoftDeleted($bandPosition);
    }
}
