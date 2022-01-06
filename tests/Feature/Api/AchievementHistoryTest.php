<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AchievementHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AchievementHistoryTest extends TestCase
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
    public function it_gets_achievement_histories_list()
    {
        $achievementHistories = AchievementHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.achievement-histories.index'));

        $response->assertOk()->assertSee($achievementHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_achievement_history()
    {
        $data = AchievementHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.achievement-histories.store'),
            $data
        );

        $this->assertDatabaseHas('achievement_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_achievement_history()
    {
        $achievementHistory = AchievementHistory::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'award_name' => $this->faker->text(255),
            'date' => $this->faker->date,
            'institution' => $this->faker->text(255),
            'no_sk' => $this->faker->text(255),
            'office_name' => $this->faker->text(255),
            'position_name' => $this->faker->text(255),
            'remarks' => $this->faker->text,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.achievement-histories.update', $achievementHistory),
            $data
        );

        $data['id'] = $achievementHistory->id;

        $this->assertDatabaseHas('achievement_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_achievement_history()
    {
        $achievementHistory = AchievementHistory::factory()->create();

        $response = $this->deleteJson(
            route('api.achievement-histories.destroy', $achievementHistory)
        );

        $this->assertSoftDeleted($achievementHistory);

        $response->assertNoContent();
    }
}
