<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobGrade;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobGradeTest extends TestCase
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
    public function it_gets_job_grades_list()
    {
        $jobGrades = JobGrade::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.job-grades.index'));

        $response->assertOk()->assertSee($jobGrades[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_grade()
    {
        $data = JobGrade::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.job-grades.store'), $data);

        $this->assertDatabaseHas('job_grades', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.job-grades.update', $jobGrade),
            $data
        );

        $data['id'] = $jobGrade->id;

        $this->assertDatabaseHas('job_grades', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_job_grade()
    {
        $jobGrade = JobGrade::factory()->create();

        $response = $this->deleteJson(
            route('api.job-grades.destroy', $jobGrade)
        );

        $this->assertSoftDeleted($jobGrade);

        $response->assertNoContent();
    }
}
