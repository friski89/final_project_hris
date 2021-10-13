<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StatusEmployee;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusEmployeeUsersTest extends TestCase
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
    public function it_gets_status_employee_users()
    {
        $statusEmployee = StatusEmployee::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'status_employee_id' => $statusEmployee->id,
            ]);

        $response = $this->getJson(
            route('api.status-employees.users.index', $statusEmployee)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_status_employee_users()
    {
        $statusEmployee = StatusEmployee::factory()->create();
        $data = User::factory()
            ->make([
                'status_employee_id' => $statusEmployee->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.status-employees.users.store', $statusEmployee),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($statusEmployee->id, $user->status_employee_id);
    }
}
