<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Jabatan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JabatanUsersTest extends TestCase
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
    public function it_gets_jabatan_users()
    {
        $jabatan = Jabatan::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'jabatan_id' => $jabatan->id,
            ]);

        $response = $this->getJson(route('api.jabatans.users.index', $jabatan));

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_jabatan_users()
    {
        $jabatan = Jabatan::factory()->create();
        $data = User::factory()
            ->make([
                'jabatan_id' => $jabatan->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.jabatans.users.store', $jabatan),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($jabatan->id, $user->jabatan_id);
    }
}
