<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobGrade;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobGradeUsersTest extends TestCase
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
    public function it_gets_job_grade_users()
    {
        $jobGrade = JobGrade::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'job_grade_id' => $jobGrade->id,
            ]);

        $response = $this->getJson(
            route('api.job-grades.users.index', $jobGrade)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_grade_users()
    {
        $jobGrade = JobGrade::factory()->create();
        $data = User::factory()
            ->make([
                'job_grade_id' => $jobGrade->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.job-grades.users.store', $jobGrade),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($jobGrade->id, $user->job_grade_id);
    }
}
