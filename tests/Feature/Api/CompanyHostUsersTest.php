<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHost;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHostUsersTest extends TestCase
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
    public function it_gets_company_host_users()
    {
        $companyHost = CompanyHost::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'company_host_id' => $companyHost->id,
            ]);

        $response = $this->getJson(
            route('api.company-hosts.users.index', $companyHost)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_company_host_users()
    {
        $companyHost = CompanyHost::factory()->create();
        $data = User::factory()
            ->make([
                'company_host_id' => $companyHost->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.company-hosts.users.store', $companyHost),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($companyHost->id, $user->company_host_id);
    }
}
