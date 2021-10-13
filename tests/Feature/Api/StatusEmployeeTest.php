<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StatusEmployee;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusEmployeeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_status_employees_list()
    {
        $statusEmployees = StatusEmployee::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.status-employees.index'));

        $response->assertOk()->assertSee($statusEmployees[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_status_employee()
    {
        $data = StatusEmployee::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.status-employees.store'), $data);

        $this->assertDatabaseHas('status_employees', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.status-employees.update', $statusEmployee),
            $data
        );

        $data['id'] = $statusEmployee->id;

        $this->assertDatabaseHas('status_employees', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_status_employee()
    {
        $statusEmployee = StatusEmployee::factory()->create();

        $response = $this->deleteJson(
            route('api.status-employees.destroy', $statusEmployee)
        );

        $this->assertSoftDeleted($statusEmployee);

        $response->assertNoContent();
    }
}
