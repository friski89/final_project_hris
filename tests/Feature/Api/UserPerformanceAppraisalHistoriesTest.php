<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PerformanceAppraisalHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPerformanceAppraisalHistoriesTest extends TestCase
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
    public function it_gets_user_performance_appraisal_histories()
    {
        $user = User::factory()->create();
        $performanceAppraisalHistories = PerformanceAppraisalHistory::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.performance-appraisal-histories.index', $user)
        );

        $response
            ->assertOk()
            ->assertSee($performanceAppraisalHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_performance_appraisal_histories()
    {
        $user = User::factory()->create();
        $data = PerformanceAppraisalHistory::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.performance-appraisal-histories.store', $user),
            $data
        );

        $this->assertDatabaseHas('performance_appraisal_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $performanceAppraisalHistory = PerformanceAppraisalHistory::latest(
            'id'
        )->first();

        $this->assertEquals($user->id, $performanceAppraisalHistory->user_id);
    }
}
