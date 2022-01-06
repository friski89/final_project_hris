<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JobGrade;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobGradeControllerTest extends TestCase
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
    public function it_displays_index_view_with_job_grades()
    {
        $jobGrades = JobGrade::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('job-grades.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.job_grades.index')
            ->assertViewHas('jobGrades');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_job_grade()
    {
        $response = $this->get(route('job-grades.create'));

        $response->assertOk()->assertViewIs('app.job_grades.create');
    }

    /**
     * @test
     */
    public function it_stores_the_job_grade()
    {
        $data = JobGrade::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('job-grades.store'), $data);

        $this->assertDatabaseHas('job_grades', $data);

        $jobGrade = JobGrade::latest('id')->first();

        $response->assertRedirect(route('job-grades.edit', $jobGrade));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_job_grade()
    {
        $jobGrade = JobGrade::factory()->create();

        $response = $this->get(route('job-grades.show', $jobGrade));

        $response
            ->assertOk()
            ->assertViewIs('app.job_grades.show')
            ->assertViewHas('jobGrade');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_job_grade()
    {
        $jobGrade = JobGrade::factory()->create();

        $response = $this->get(route('job-grades.edit', $jobGrade));

        $response
            ->assertOk()
            ->assertViewIs('app.job_grades.edit')
            ->assertViewHas('jobGrade');
    }

    /**
     * @test
     */
    public function it_updates_the_job_grade()
    {
        $jobGrade = JobGrade::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('job-grades.update', $jobGrade), $data);

        $data['id'] = $jobGrade->id;

        $this->assertDatabaseHas('job_grades', $data);

        $response->assertRedirect(route('job-grades.edit', $jobGrade));
    }

    /**
     * @test
     */
    public function it_deletes_the_job_grade()
    {
        $jobGrade = JobGrade::factory()->create();

        $response = $this->delete(route('job-grades.destroy', $jobGrade));

        $response->assertRedirect(route('job-grades.index'));

        $this->assertSoftDeleted($jobGrade);
    }
}
