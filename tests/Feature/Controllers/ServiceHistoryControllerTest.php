<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ServiceHistory;

use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\BandPosition;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_service_histories()
    {
        $serviceHistories = ServiceHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('service-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.service_histories.index')
            ->assertViewHas('serviceHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_service_history()
    {
        $response = $this->get(route('service-histories.create'));

        $response->assertOk()->assertViewIs('app.service_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_service_history()
    {
        $data = ServiceHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('service-histories.store'), $data);

        $this->assertDatabaseHas('service_histories', $data);

        $serviceHistory = ServiceHistory::latest('id')->first();

        $response->assertRedirect(
            route('service-histories.edit', $serviceHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_service_history()
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->get(
            route('service-histories.show', $serviceHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.service_histories.show')
            ->assertViewHas('serviceHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_service_history()
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->get(
            route('service-histories.edit', $serviceHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.service_histories.edit')
            ->assertViewHas('serviceHistory');
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

        $response = $this->put(
            route('service-histories.update', $serviceHistory),
            $data
        );

        $data['id'] = $serviceHistory->id;

        $this->assertDatabaseHas('service_histories', $data);

        $response->assertRedirect(
            route('service-histories.edit', $serviceHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_service_history()
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->delete(
            route('service-histories.destroy', $serviceHistory)
        );

        $response->assertRedirect(route('service-histories.index'));

        $this->assertSoftDeleted($serviceHistory);
    }
}
