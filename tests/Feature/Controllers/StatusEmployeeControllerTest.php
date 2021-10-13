<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\StatusEmployee;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusEmployeeControllerTest extends TestCase
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
    public function it_displays_index_view_with_status_employees()
    {
        $statusEmployees = StatusEmployee::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('status-employees.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.status_employees.index')
            ->assertViewHas('statusEmployees');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_status_employee()
    {
        $response = $this->get(route('status-employees.create'));

        $response->assertOk()->assertViewIs('app.status_employees.create');
    }

    /**
     * @test
     */
    public function it_stores_the_status_employee()
    {
        $data = StatusEmployee::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('status-employees.store'), $data);

        $this->assertDatabaseHas('status_employees', $data);

        $statusEmployee = StatusEmployee::latest('id')->first();

        $response->assertRedirect(
            route('status-employees.edit', $statusEmployee)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_status_employee()
    {
        $statusEmployee = StatusEmployee::factory()->create();

        $response = $this->get(route('status-employees.show', $statusEmployee));

        $response
            ->assertOk()
            ->assertViewIs('app.status_employees.show')
            ->assertViewHas('statusEmployee');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_status_employee()
    {
        $statusEmployee = StatusEmployee::factory()->create();

        $response = $this->get(route('status-employees.edit', $statusEmployee));

        $response
            ->assertOk()
            ->assertViewIs('app.status_employees.edit')
            ->assertViewHas('statusEmployee');
    }

    /**
     * @test
     */
    public function it_updates_the_status_employee()
    {
        $statusEmployee = StatusEmployee::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('status-employees.update', $statusEmployee),
            $data
        );

        $data['id'] = $statusEmployee->id;

        $this->assertDatabaseHas('status_employees', $data);

        $response->assertRedirect(
            route('status-employees.edit', $statusEmployee)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_status_employee()
    {
        $statusEmployee = StatusEmployee::factory()->create();

        $response = $this->delete(
            route('status-employees.destroy', $statusEmployee)
        );

        $response->assertRedirect(route('status-employees.index'));

        $this->assertSoftDeleted($statusEmployee);
    }
}
