<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ServiceHistory;

use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\BandPosition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceHistoryTest extends TestCase
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
    public function it_gets_service_histories_list()
    {
        $serviceHistories = ServiceHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.service-histories.index'));

        $response->assertOk()->assertSee($serviceHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_service_history()
    {
        $data = ServiceHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.service-histories.store'),
            $data
        );

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_service_history()
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $companyHome = CompanyHome::factory()->create();
        $companyHost = CompanyHost::factory()->create();
        $bandPosition = BandPosition::factory()->create();
        $jobTitle = JobTitle::factory()->create();
        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'emoloyee_name' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'type' => $this->faker->word,
            'company_home_id' => $companyHome->id,
            'company_host_id' => $companyHost->id,
            'band_position_id' => $bandPosition->id,
            'job_title_id' => $jobTitle->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.service-histories.update', $serviceHistory),
            $data
        );

        $data['id'] = $serviceHistory->id;

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_service_history()
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->deleteJson(
            route('api.service-histories.destroy', $serviceHistory)
        );

        $this->assertSoftDeleted($serviceHistory);

        $response->assertNoContent();
    }
}
