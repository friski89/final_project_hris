<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CityRecuite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityRecuiteControllerTest extends TestCase
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
    public function it_displays_index_view_with_city_recuites()
    {
        $cityRecuites = CityRecuite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('city-recuites.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.city_recuites.index')
            ->assertViewHas('cityRecuites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_city_recuite()
    {
        $response = $this->get(route('city-recuites.create'));

        $response->assertOk()->assertViewIs('app.city_recuites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_city_recuite()
    {
        $data = CityRecuite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('city-recuites.store'), $data);

        $this->assertDatabaseHas('city_recuites', $data);

        $cityRecuite = CityRecuite::latest('id')->first();

        $response->assertRedirect(route('city-recuites.edit', $cityRecuite));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $response = $this->get(route('city-recuites.show', $cityRecuite));

        $response
            ->assertOk()
            ->assertViewIs('app.city_recuites.show')
            ->assertViewHas('cityRecuite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $response = $this->get(route('city-recuites.edit', $cityRecuite));

        $response
            ->assertOk()
            ->assertViewIs('app.city_recuites.edit')
            ->assertViewHas('cityRecuite');
    }

    /**
     * @test
     */
    public function it_updates_the_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('city-recuites.update', $cityRecuite),
            $data
        );

        $data['id'] = $cityRecuite->id;

        $this->assertDatabaseHas('city_recuites', $data);

        $response->assertRedirect(route('city-recuites.edit', $cityRecuite));
    }

    /**
     * @test
     */
    public function it_deletes_the_city_recuite()
    {
        $cityRecuite = CityRecuite::factory()->create();

        $response = $this->delete(route('city-recuites.destroy', $cityRecuite));

        $response->assertRedirect(route('city-recuites.index'));

        $this->assertDeleted($cityRecuite);
    }
}
