<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Direktorat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirektoratUsersTest extends TestCase
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
    public function it_gets_direktorat_users()
    {
        $direktorat = Direktorat::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'direktorat_id' => $direktorat->id,
            ]);

        $response = $this->getJson(
            route('api.direktorats.users.index', $direktorat)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_direktorat_users()
    {
        $direktorat = Direktorat::factory()->create();
        $data = User::factory()
            ->make([
                'direktorat_id' => $direktorat->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.direktorats.users.store', $direktorat),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($direktorat->id, $user->direktorat_id);
    }
}
