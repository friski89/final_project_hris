<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobTitle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTitleUsersTest extends TestCase
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
    public function it_gets_job_title_users()
    {
        $jobTitle = JobTitle::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'job_title_id' => $jobTitle->id,
            ]);

        $response = $this->getJson(
            route('api.job-titles.users.index', $jobTitle)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_title_users()
    {
        $jobTitle = JobTitle::factory()->create();
        $data = User::factory()
            ->make([
                'job_title_id' => $jobTitle->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.job-titles.users.store', $jobTitle),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($jobTitle->id, $user->job_title_id);
    }
}
