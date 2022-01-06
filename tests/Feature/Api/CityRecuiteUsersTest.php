<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CityRecuite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityRecuiteUsersTest extends TestCase
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
    public function it_gets_city_recuite_users()
    {
        $cityRecuite = CityRecuite::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'city_recuite_id' => $cityRecuite->id,
            ]);

        $response = $this->getJson(
            route('api.city-recuites.users.index', $cityRecuite)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_city_recuite_users()
    {
        $cityRecuite = CityRecuite::factory()->create();
        $data = User::factory()
            ->make([
                'city_recuite_id' => $cityRecuite->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.city-recuites.users.store', $cityRecuite),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($cityRecuite->id, $user->city_recuite_id);
    }
}
