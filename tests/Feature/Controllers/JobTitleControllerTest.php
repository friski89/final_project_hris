<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JobTitle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTitleControllerTest extends TestCase
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
    public function it_displays_index_view_with_job_titles()
    {
        $jobTitles = JobTitle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('job-titles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.job_titles.index')
            ->assertViewHas('jobTitles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_job_title()
    {
        $response = $this->get(route('job-titles.create'));

        $response->assertOk()->assertViewIs('app.job_titles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_job_title()
    {
        $data = JobTitle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('job-titles.store'), $data);

        $this->assertDatabaseHas('job_titles', $data);

        $jobTitle = JobTitle::latest('id')->first();

        $response->assertRedirect(route('job-titles.edit', $jobTitle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_job_title()
    {
        $jobTitle = JobTitle::factory()->create();

        $response = $this->get(route('job-titles.show', $jobTitle));

        $response
            ->assertOk()
            ->assertViewIs('app.job_titles.show')
            ->assertViewHas('jobTitle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_job_title()
    {
        $jobTitle = JobTitle::factory()->create();

        $response = $this->get(route('job-titles.edit', $jobTitle));

        $response
            ->assertOk()
            ->assertViewIs('app.job_titles.edit')
            ->assertViewHas('jobTitle');
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

        $response = $this->put(route('job-titles.update', $jobTitle), $data);

        $data['id'] = $jobTitle->id;

        $this->assertDatabaseHas('job_titles', $data);

        $response->assertRedirect(route('job-titles.edit', $jobTitle));
    }

    /**
     * @test
     */
    public function it_deletes_the_job_title()
    {
        $jobTitle = JobTitle::factory()->create();

        $response = $this->delete(route('job-titles.destroy', $jobTitle));

        $response->assertRedirect(route('job-titles.index'));

        $this->assertSoftDeleted($jobTitle);
    }
}
