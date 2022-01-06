<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JobFunction;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFunctionControllerTest extends TestCase
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
    public function it_displays_index_view_with_job_functions()
    {
        $jobFunctions = JobFunction::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('job-functions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.job_functions.index')
            ->assertViewHas('jobFunctions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_job_function()
    {
        $response = $this->get(route('job-functions.create'));

        $response->assertOk()->assertViewIs('app.job_functions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_job_function()
    {
        $data = JobFunction::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('job-functions.store'), $data);

        $this->assertDatabaseHas('job_functions', $data);

        $jobFunction = JobFunction::latest('id')->first();

        $response->assertRedirect(route('job-functions.edit', $jobFunction));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_job_function()
    {
        $jobFunction = JobFunction::factory()->create();

        $response = $this->get(route('job-functions.show', $jobFunction));

        $response
            ->assertOk()
            ->assertViewIs('app.job_functions.show')
            ->assertViewHas('jobFunction');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_job_function()
    {
        $jobFunction = JobFunction::factory()->create();

        $response = $this->get(route('job-functions.edit', $jobFunction));

        $response
            ->assertOk()
            ->assertViewIs('app.job_functions.edit')
            ->assertViewHas('jobFunction');
    }

    /**
     * @test
     */
    public function it_updates_the_job_function()
    {
        $jobFunction = JobFunction::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('job-functions.update', $jobFunction),
            $data
        );

        $data['id'] = $jobFunction->id;

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertRedirect(route('job-functions.edit', $jobFunction));
    }

    /**
     * @test
     */
    public function it_deletes_the_job_function()
    {
        $jobFunction = JobFunction::factory()->create();

        $response = $this->delete(route('job-functions.destroy', $jobFunction));

        $response->assertRedirect(route('job-functions.index'));

        $this->assertSoftDeleted($jobFunction);
    }
}
