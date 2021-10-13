<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Family;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFamiliesTest extends TestCase
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
    public function it_gets_user_families()
    {
        $user = User::factory()->create();
        $families = Family::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.families.index', $user));

        $response->assertOk()->assertSee($families[0]->employee_name);
    }

    /**
     * @test
     */
    public function it_stores_the_user_families()
    {
        $user = User::factory()->create();
        $data = Family::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.families.store', $user),
            $data
        );

        $this->assertDatabaseHas('families', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $family = Family::latest('id')->first();

        $this->assertEquals($user->id, $family->user_id);
    }
}
