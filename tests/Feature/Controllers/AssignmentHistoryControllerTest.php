<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AssignmentHistory;

use App\Models\JobTitle;
use App\Models\CompanyHome;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_assignment_histories()
    {
        $assignmentHistories = AssignmentHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('assignment-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.assignment_histories.index')
            ->assertViewHas('assignmentHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_assignment_history()
    {
        $response = $this->get(route('assignment-histories.create'));

        $response->assertOk()->assertViewIs('app.assignment_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_assignment_history()
    {
        $data = AssignmentHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('assignment-histories.store'), $data);

        $this->assertDatabaseHas('assignment_histories', $data);

        $assignmentHistory = AssignmentHistory::latest('id')->first();

        $response->assertRedirect(
            route('assignment-histories.edit', $assignmentHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_assignment_history()
    {
        $assignmentHistory = AssignmentHistory::factory()->create();

        $response = $this->get(
            route('assignment-histories.show', $assignmentHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.assignment_histories.show')
            ->assertViewHas('assignmentHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_assignment_history()
    {
        $assignmentHistory = AssignmentHistory::factory()->create();

        $response = $this->get(
            route('assignment-histories.edit', $assignmentHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.assignment_histories.edit')
            ->assertViewHas('assignmentHistory');
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

        $response = $this->put(
            route('assignment-histories.update', $assignmentHistory),
            $data
        );

        $data['id'] = $assignmentHistory->id;

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertRedirect(
            route('assignment-histories.edit', $assignmentHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_assignment_history()
    {
        $assignmentHistory = AssignmentHistory::factory()->create();

        $response = $this->delete(
            route('assignment-histories.destroy', $assignmentHistory)
        );

        $response->assertRedirect(route('assignment-histories.index'));

        $this->assertSoftDeleted($assignmentHistory);
    }
}
