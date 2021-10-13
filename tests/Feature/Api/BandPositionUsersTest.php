<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BandPosition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandPositionUsersTest extends TestCase
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
    public function it_gets_band_position_users()
    {
        $bandPosition = BandPosition::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'band_position_id' => $bandPosition->id,
            ]);

        $response = $this->getJson(
            route('api.band-positions.users.index', $bandPosition)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_band_position_users()
    {
        $bandPosition = BandPosition::factory()->create();
        $data = User::factory()
            ->make([
                'band_position_id' => $bandPosition->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.band-positions.users.store', $bandPosition),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($bandPosition->id, $user->band_position_id);
    }
}
