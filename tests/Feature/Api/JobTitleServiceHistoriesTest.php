<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobTitle;
use App\Models\ServiceHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTitleServiceHistoriesTest extends TestCase
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
    public function it_gets_job_title_service_histories()
    {
        $jobTitle = JobTitle::factory()->create();
        $serviceHistories = ServiceHistory::factory()
            ->count(2)
            ->create([
                'job_title_id' => $jobTitle->id,
            ]);

        $response = $this->getJson(
            route('api.job-titles.service-histories.index', $jobTitle)
        );

        $response->assertOk()->assertSee($serviceHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_job_title_service_histories()
    {
        $jobTitle = JobTitle::factory()->create();
        $data = ServiceHistory::factory()
            ->make([
                'job_title_id' => $jobTitle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.job-titles.service-histories.store', $jobTitle),
            $data
        );

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $serviceHistory = ServiceHistory::latest('id')->first();

        $this->assertEquals($jobTitle->id, $serviceHistory->job_title_id);
    }
}
