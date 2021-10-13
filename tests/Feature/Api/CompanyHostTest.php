<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHost;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHostTest extends TestCase
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
    public function it_gets_company_hosts_list()
    {
        $companyHosts = CompanyHost::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.company-hosts.index'));

        $response->assertOk()->assertSee($companyHosts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_company_host()
    {
        $data = CompanyHost::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.company-hosts.store'), $data);

        $this->assertDatabaseHas('company_hosts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_company_host()
    {
        $companyHost = CompanyHost::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.company-hosts.update', $companyHost),
            $data
        );

        $data['id'] = $companyHost->id;

        $this->assertDatabaseHas('company_hosts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_company_host()
    {
        $companyHost = CompanyHost::factory()->create();

        $response = $this->deleteJson(
            route('api.company-hosts.destroy', $companyHost)
        );

        $this->assertSoftDeleted($companyHost);

        $response->assertNoContent();
    }
}
