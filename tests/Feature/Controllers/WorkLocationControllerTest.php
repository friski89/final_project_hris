<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\WorkLocation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkLocationControllerTest extends TestCase
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
    public function it_displays_index_view_with_work_locations()
    {
        $workLocations = WorkLocation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('work-locations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.work_locations.index')
            ->assertViewHas('workLocations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_work_location()
    {
        $response = $this->get(route('work-locations.create'));

        $response->assertOk()->assertViewIs('app.work_locations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_work_location()
    {
        $data = WorkLocation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('work-locations.store'), $data);

        $this->assertDatabaseHas('work_locations', $data);

        $workLocation = WorkLocation::latest('id')->first();

        $response->assertRedirect(route('work-locations.edit', $workLocation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $response = $this->get(route('work-locations.show', $workLocation));

        $response
            ->assertOk()
            ->assertViewIs('app.work_locations.show')
            ->assertViewHas('workLocation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $response = $this->get(route('work-locations.edit', $workLocation));

        $response
            ->assertOk()
            ->assertViewIs('app.work_locations.edit')
            ->assertViewHas('workLocation');
    }

    /**
     * @test
     */
    public function it_updates_the_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('work-locations.update', $workLocation),
            $data
        );

        $data['id'] = $workLocation->id;

        $this->assertDatabaseHas('work_locations', $data);

        $response->assertRedirect(route('work-locations.edit', $workLocation));
    }

    /**
     * @test
     */
    public function it_deletes_the_work_location()
    {
        $workLocation = WorkLocation::factory()->create();

        $response = $this->delete(
            route('work-locations.destroy', $workLocation)
        );

        $response->assertRedirect(route('work-locations.index'));

        $this->assertSoftDeleted($workLocation);
    }
}
