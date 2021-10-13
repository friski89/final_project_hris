<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PerformanceAppraisalHistory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceAppraisalHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_performance_appraisal_histories()
    {
        $performanceAppraisalHistories = PerformanceAppraisalHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('performance-appraisal-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.performance_appraisal_histories.index')
            ->assertViewHas('performanceAppraisalHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_performance_appraisal_history()
    {
        $response = $this->get(route('performance-appraisal-histories.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.performance_appraisal_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_performance_appraisal_history()
    {
        $data = PerformanceAppraisalHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(
            route('performance-appraisal-histories.store'),
            $data
        );

        $this->assertDatabaseHas('performance_appraisal_histories', $data);

        $performanceAppraisalHistory = PerformanceAppraisalHistory::latest(
            'id'
        )->first();

        $response->assertRedirect(
            route(
                'performance-appraisal-histories.edit',
                $performanceAppraisalHistory
            )
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_performance_appraisal_history()
    {
        $performanceAppraisalHistory = PerformanceAppraisalHistory::factory()->create();

        $response = $this->get(
            route(
                'performance-appraisal-histories.show',
                $performanceAppraisalHistory
            )
        );

        $response
            ->assertOk()
            ->assertViewIs('app.performance_appraisal_histories.show')
            ->assertViewHas('performanceAppraisalHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_performance_appraisal_history()
    {
        $performanceAppraisalHistory = PerformanceAppraisalHistory::factory()->create();

        $response = $this->get(
            route(
                'performance-appraisal-histories.edit',
                $performanceAppraisalHistory
            )
        );

        $response
            ->assertOk()
            ->assertViewIs('app.performance_appraisal_histories.edit')
            ->assertViewHas('performanceAppraisalHistory');
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

        $response = $this->put(
            route(
                'performance-appraisal-histories.update',
                $performanceAppraisalHistory
            ),
            $data
        );

        $data['id'] = $performanceAppraisalHistory->id;

        $this->assertDatabaseHas('performance_appraisal_histories', $data);

        $response->assertRedirect(
            route(
                'performance-appraisal-histories.edit',
                $performanceAppraisalHistory
            )
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_performance_appraisal_history()
    {
        $performanceAppraisalHistory = PerformanceAppraisalHistory::factory()->create();

        $response = $this->delete(
            route(
                'performance-appraisal-histories.destroy',
                $performanceAppraisalHistory
            )
        );

        $response->assertRedirect(
            route('performance-appraisal-histories.index')
        );

        $this->assertSoftDeleted($performanceAppraisalHistory);
    }
}
