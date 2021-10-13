<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobTitle;
use App\Models\AssignmentHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTitleAssignmentHistoriesTest extends TestCase
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
    public function it_gets_job_title_assignment_histories()
    {
        $jobTitle = JobTitle::factory()->create();
        $assignmentHistories = AssignmentHistory::factory()
            ->count(2)
            ->create([
                'job_title_id' => $jobTitle->id,
            ]);

        $response = $this->getJson(
            route('api.job-titles.assignment-histories.index', $jobTitle)
        );

        $response->assertOk()->assertSee($assignmentHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_job_title_assignment_histories()
    {
        $jobTitle = JobTitle::factory()->create();
        $data = AssignmentHistory::factory()
            ->make([
                'job_title_id' => $jobTitle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.job-titles.assignment-histories.store', $jobTitle),
            $data
        );

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $assignmentHistory = AssignmentHistory::latest('id')->first();

        $this->assertEquals($jobTitle->id, $assignmentHistory->job_title_id);
    }
}
