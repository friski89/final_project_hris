<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobFunction;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFunctionTest extends TestCase
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
    public function it_gets_job_functions_list()
    {
        $jobFunctions = JobFunction::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.job-functions.index'));

        $response->assertOk()->assertSee($jobFunctions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_function()
    {
        $data = JobFunction::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.job-functions.store'), $data);

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.job-functions.update', $jobFunction),
            $data
        );

        $data['id'] = $jobFunction->id;

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_job_function()
    {
        $jobFunction = JobFunction::factory()->create();

        $response = $this->deleteJson(
            route('api.job-functions.destroy', $jobFunction)
        );

        $this->assertSoftDeleted($jobFunction);

        $response->assertNoContent();
    }
}
