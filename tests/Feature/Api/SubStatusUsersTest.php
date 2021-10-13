<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SubStatus;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubStatusUsersTest extends TestCase
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
    public function it_gets_sub_status_users()
    {
        $subStatus = SubStatus::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'sub_status_id' => $subStatus->id,
            ]);

        $response = $this->getJson(
            route('api.sub-statuses.users.index', $subStatus)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_sub_status_users()
    {
        $subStatus = SubStatus::factory()->create();
        $data = User::factory()
            ->make([
                'sub_status_id' => $subStatus->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.sub-statuses.users.store', $subStatus),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($subStatus->id, $user->sub_status_id);
    }
}
