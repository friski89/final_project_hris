<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AchievementHistory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AchievementHistoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_achievement_histories()
    {
        $achievementHistories = AchievementHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('achievement-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.achievement_histories.index')
            ->assertViewHas('achievementHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_achievement_history()
    {
        $response = $this->get(route('achievement-histories.create'));

        $response->assertOk()->assertViewIs('app.achievement_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_achievement_history()
    {
        $data = AchievementHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('achievement-histories.store'), $data);

        $this->assertDatabaseHas('achievement_histories', $data);

        $achievementHistory = AchievementHistory::latest('id')->first();

        $response->assertRedirect(
            route('achievement-histories.edit', $achievementHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_achievement_history()
    {
        $achievementHistory = AchievementHistory::factory()->create();

        $response = $this->get(
            route('achievement-histories.show', $achievementHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.achievement_histories.show')
            ->assertViewHas('achievementHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_achievement_history()
    {
        $achievementHistory = AchievementHistory::factory()->create();

        $response = $this->get(
            route('achievement-histories.edit', $achievementHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.achievement_histories.edit')
            ->assertViewHas('achievementHistory');
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

        $response = $this->put(
            route('achievement-histories.update', $achievementHistory),
            $data
        );

        $data['id'] = $achievementHistory->id;

        $this->assertDatabaseHas('achievement_histories', $data);

        $response->assertRedirect(
            route('achievement-histories.edit', $achievementHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_achievement_history()
    {
        $achievementHistory = AchievementHistory::factory()->create();

        $response = $this->delete(
            route('achievement-histories.destroy', $achievementHistory)
        );

        $response->assertRedirect(route('achievement-histories.index'));

        $this->assertSoftDeleted($achievementHistory);
    }
}
