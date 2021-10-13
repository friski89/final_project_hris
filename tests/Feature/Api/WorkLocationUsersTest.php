<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\WorkLocation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkLocationUsersTest extends TestCase
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
    public function it_gets_work_location_users()
    {
        $workLocation = WorkLocation::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'work_location_id' => $workLocation->id,
            ]);

        $response = $this->getJson(
            route('api.work-locations.users.index', $workLocation)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_work_location_users()
    {
        $workLocation = WorkLocation::factory()->create();
        $data = User::factory()
            ->make([
                'work_location_id' => $workLocation->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.work-locations.users.store', $workLocation),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($workLocation->id, $user->work_location_id);
    }
}
