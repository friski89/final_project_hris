<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PerformanceAppraisalHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceAppraisalHistoryTest extends TestCase
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
    public function it_gets_performance_appraisal_histories_list()
    {
        $performanceAppraisalHistories = PerformanceAppraisalHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(
            route('api.performance-appraisal-histories.index')
        );

        $response
            ->assertOk()
            ->assertSee($performanceAppraisalHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_performance_appraisal_history()
    {
        $data = PerformanceAppraisalHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.performance-appraisal-histories.store'),
            $data
        );

        $this->assertDatabaseHas('performance_appraisal_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_performance_appraisal_history()
    {
        $performanceAppraisalHistory = PerformanceAppraisalHistory::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'year' => $this->faker->year,
            'performance_value' => $this->faker->text(255),
            'performance_score' => $this->faker->text(255),
            'competency_value' => $this->faker->text(255),
            'behavioral_value' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route(
                'api.performance-appraisal-histories.update',
                $performanceAppraisalHistory
            ),
            $data
        );

        $data['id'] = $performanceAppraisalHistory->id;

        $this->assertDatabaseHas('performance_appraisal_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_performance_appraisal_history()
    {
        $performanceAppraisalHistory = PerformanceAppraisalHistory::factory()->create();

        $response = $this->deleteJson(
            route(
                'api.performance-appraisal-histories.destroy',
                $performanceAppraisalHistory
            )
        );

        $this->assertSoftDeleted($performanceAppraisalHistory);

        $response->assertNoContent();
    }
}
