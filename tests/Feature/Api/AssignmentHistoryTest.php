<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssignmentHistory;

use App\Models\JobTitle;
use App\Models\CompanyHome;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentHistoryTest extends TestCase
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
    public function it_gets_assignment_histories_list()
    {
        $assignmentHistories = AssignmentHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.assignment-histories.index'));

        $response->assertOk()->assertSee($assignmentHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_assignment_history()
    {
        $data = AssignmentHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.assignment-histories.store'),
            $data
        );

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_assignment_history()
    {
        $assignmentHistory = AssignmentHistory::factory()->create();

        $companyHome = CompanyHome::factory()->create();
        $jobTitle = JobTitle::factory()->create();
        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'date' => $this->faker->date,
            'company_home_id' => $companyHome->id,
            'job_title_id' => $jobTitle->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.assignment-histories.update', $assignmentHistory),
            $data
        );

        $data['id'] = $assignmentHistory->id;

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_assignment_history()
    {
        $assignmentHistory = AssignmentHistory::factory()->create();

        $response = $this->deleteJson(
            route('api.assignment-histories.destroy', $assignmentHistory)
        );

        $this->assertSoftDeleted($assignmentHistory);

        $response->assertNoContent();
    }
}
