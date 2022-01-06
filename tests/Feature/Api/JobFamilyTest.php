<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobFamily;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFamilyTest extends TestCase
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
    public function it_gets_job_families_list()
    {
        $jobFamilies = JobFamily::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.job-families.index'));

        $response->assertOk()->assertSee($jobFamilies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_family()
    {
        $data = JobFamily::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.job-families.store'), $data);

        $this->assertDatabaseHas('job_families', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.job-families.update', $jobFamily),
            $data
        );

        $data['id'] = $jobFamily->id;

        $this->assertDatabaseHas('job_families', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_job_family()
    {
        $jobFamily = JobFamily::factory()->create();

        $response = $this->deleteJson(
            route('api.job-families.destroy', $jobFamily)
        );

        $this->assertSoftDeleted($jobFamily);

        $response->assertNoContent();
    }
}
