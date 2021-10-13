<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobFamily;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFamilyUsersTest extends TestCase
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
    public function it_gets_job_family_users()
    {
        $jobFamily = JobFamily::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'job_family_id' => $jobFamily->id,
            ]);

        $response = $this->getJson(
            route('api.job-families.users.index', $jobFamily)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_family_users()
    {
        $jobFamily = JobFamily::factory()->create();
        $data = User::factory()
            ->make([
                'job_family_id' => $jobFamily->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.job-families.users.store', $jobFamily),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($jobFamily->id, $user->job_family_id);
    }
}
