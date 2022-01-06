<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobTitle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTitleTest extends TestCase
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
    public function it_gets_job_titles_list()
    {
        $jobTitles = JobTitle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.job-titles.index'));

        $response->assertOk()->assertSee($jobTitles[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_title()
    {
        $data = JobTitle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.job-titles.store'), $data);

        $this->assertDatabaseHas('job_titles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_job_title()
    {
        $jobTitle = JobTitle::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.job-titles.update', $jobTitle),
            $data
        );

        $data['id'] = $jobTitle->id;

        $this->assertDatabaseHas('job_titles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_job_title()
    {
        $jobTitle = JobTitle::factory()->create();

        $response = $this->deleteJson(
            route('api.job-titles.destroy', $jobTitle)
        );

        $this->assertSoftDeleted($jobTitle);

        $response->assertNoContent();
    }
}
