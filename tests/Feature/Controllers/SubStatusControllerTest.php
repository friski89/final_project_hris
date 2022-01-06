<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SubStatus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubStatusControllerTest extends TestCase
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
    public function it_displays_index_view_with_sub_statuses()
    {
        $subStatuses = SubStatus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('sub-statuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.sub_statuses.index')
            ->assertViewHas('subStatuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sub_status()
    {
        $response = $this->get(route('sub-statuses.create'));

        $response->assertOk()->assertViewIs('app.sub_statuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sub_status()
    {
        $data = SubStatus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('sub-statuses.store'), $data);

        $this->assertDatabaseHas('sub_statuses', $data);

        $subStatus = SubStatus::latest('id')->first();

        $response->assertRedirect(route('sub-statuses.edit', $subStatus));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $response = $this->get(route('sub-statuses.show', $subStatus));

        $response
            ->assertOk()
            ->assertViewIs('app.sub_statuses.show')
            ->assertViewHas('subStatus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $response = $this->get(route('sub-statuses.edit', $subStatus));

        $response
            ->assertOk()
            ->assertViewIs('app.sub_statuses.edit')
            ->assertViewHas('subStatus');
    }

    /**
     * @test
     */
    public function it_updates_the_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('sub-statuses.update', $subStatus), $data);

        $data['id'] = $subStatus->id;

        $this->assertDatabaseHas('sub_statuses', $data);

        $response->assertRedirect(route('sub-statuses.edit', $subStatus));
    }

    /**
     * @test
     */
    public function it_deletes_the_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $response = $this->delete(route('sub-statuses.destroy', $subStatus));

        $response->assertRedirect(route('sub-statuses.index'));

        $this->assertSoftDeleted($subStatus);
    }
}
