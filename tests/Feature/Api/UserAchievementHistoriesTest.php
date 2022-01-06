<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AchievementHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAchievementHistoriesTest extends TestCase
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
    public function it_gets_user_achievement_histories()
    {
        $user = User::factory()->create();
        $achievementHistories = AchievementHistory::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.achievement-histories.index', $user)
        );

        $response->assertOk()->assertSee($achievementHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_achievement_histories()
    {
        $user = User::factory()->create();
        $data = AchievementHistory::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.achievement-histories.store', $user),
            $data
        );

        $this->assertDatabaseHas('achievement_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $achievementHistory = AchievementHistory::latest('id')->first();

        $this->assertEquals($user->id, $achievementHistory->user_id);
    }
}
