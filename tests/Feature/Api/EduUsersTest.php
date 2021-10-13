<?php

namespace Tests\Feature\Api;

use App\Models\Edu;
use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EduUsersTest extends TestCase
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
    public function it_gets_edu_users()
    {
        $edu = Edu::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'edu_id' => $edu->id,
            ]);

        $response = $this->getJson(route('api.edus.users.index', $edu));

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_edu_users()
    {
        $edu = Edu::factory()->create();
        $data = User::factory()
            ->make([
                'edu_id' => $edu->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(route('api.edus.users.store', $edu), $data);

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($edu->id, $user->edu_id);
    }
}
