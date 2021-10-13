<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JobFamily;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFamilyControllerTest extends TestCase
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
    public function it_displays_index_view_with_job_families()
    {
        $jobFamilies = JobFamily::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('job-families.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.job_families.index')
            ->assertViewHas('jobFamilies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_job_family()
    {
        $response = $this->get(route('job-families.create'));

        $response->assertOk()->assertViewIs('app.job_families.create');
    }

    /**
     * @test
     */
    public function it_stores_the_job_family()
    {
        $data = JobFamily::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('job-families.store'), $data);

        $this->assertDatabaseHas('job_families', $data);

        $jobFamily = JobFamily::latest('id')->first();

        $response->assertRedirect(route('job-families.edit', $jobFamily));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_job_family()
    {
        $jobFamily = JobFamily::factory()->create();

        $response = $this->get(route('job-families.show', $jobFamily));

        $response
            ->assertOk()
            ->assertViewIs('app.job_families.show')
            ->assertViewHas('jobFamily');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_job_family()
    {
        $jobFamily = JobFamily::factory()->create();

        $response = $this->get(route('job-families.edit', $jobFamily));

        $response
            ->assertOk()
            ->assertViewIs('app.job_families.edit')
            ->assertViewHas('jobFamily');
    }

    /**
     * @test
     */
    public function it_updates_the_job_family()
    {
        $jobFamily = JobFamily::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('job-families.update', $jobFamily), $data);

        $data['id'] = $jobFamily->id;

        $this->assertDatabaseHas('job_families', $data);

        $response->assertRedirect(route('job-families.edit', $jobFamily));
    }

    /**
     * @test
     */
    public function it_deletes_the_job_family()
    {
        $jobFamily = JobFamily::factory()->create();

        $response = $this->delete(route('job-families.destroy', $jobFamily));

        $response->assertRedirect(route('job-families.index'));

        $this->assertSoftDeleted($jobFamily);
    }
}
