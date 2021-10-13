<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHost;
use App\Models\ServiceHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHostServiceHistoriesTest extends TestCase
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
    public function it_gets_company_host_service_histories()
    {
        $companyHost = CompanyHost::factory()->create();
        $serviceHistories = ServiceHistory::factory()
            ->count(2)
            ->create([
                'company_host_id' => $companyHost->id,
            ]);

        $response = $this->getJson(
            route('api.company-hosts.service-histories.index', $companyHost)
        );

        $response->assertOk()->assertSee($serviceHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_company_host_service_histories()
    {
        $companyHost = CompanyHost::factory()->create();
        $data = ServiceHistory::factory()
            ->make([
                'company_host_id' => $companyHost->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.company-hosts.service-histories.store', $companyHost),
            $data
        );

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $serviceHistory = ServiceHistory::latest('id')->first();

        $this->assertEquals($companyHost->id, $serviceHistory->company_host_id);
    }
}
