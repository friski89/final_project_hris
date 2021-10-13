<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHome;
use App\Models\ServiceHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHomeServiceHistoriesTest extends TestCase
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
    public function it_gets_company_home_service_histories()
    {
        $companyHome = CompanyHome::factory()->create();
        $serviceHistories = ServiceHistory::factory()
            ->count(2)
            ->create([
                'company_home_id' => $companyHome->id,
            ]);

        $response = $this->getJson(
            route('api.company-homes.service-histories.index', $companyHome)
        );

        $response->assertOk()->assertSee($serviceHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_company_home_service_histories()
    {
        $companyHome = CompanyHome::factory()->create();
        $data = ServiceHistory::factory()
            ->make([
                'company_home_id' => $companyHome->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.company-homes.service-histories.store', $companyHome),
            $data
        );

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $serviceHistory = ServiceHistory::latest('id')->first();

        $this->assertEquals($companyHome->id, $serviceHistory->company_home_id);
    }
}
