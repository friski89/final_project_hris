<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHome;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHomeUsersTest extends TestCase
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
    public function it_gets_company_home_users()
    {
        $companyHome = CompanyHome::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'company_home_id' => $companyHome->id,
            ]);

        $response = $this->getJson(
            route('api.company-homes.users.index', $companyHome)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_company_home_users()
    {
        $companyHome = CompanyHome::factory()->create();
        $data = User::factory()
            ->make([
                'company_home_id' => $companyHome->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.company-homes.users.store', $companyHome),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($companyHome->id, $user->company_home_id);
    }
}
