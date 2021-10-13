<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Division;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DivisionUsersTest extends TestCase
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
    public function it_gets_division_users()
    {
        $division = Division::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'division_id' => $division->id,
            ]);

        $response = $this->getJson(
            route('api.divisions.users.index', $division)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_division_users()
    {
        $division = Division::factory()->create();
        $data = User::factory()
            ->make([
                'division_id' => $division->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.divisions.users.store', $division),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($division->id, $user->division_id);
    }
}
