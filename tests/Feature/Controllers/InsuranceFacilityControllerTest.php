<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\InsuranceFacility;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsuranceFacilityControllerTest extends TestCase
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
    public function it_displays_index_view_with_insurance_facilities()
    {
        $insuranceFacilities = InsuranceFacility::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('insurance-facilities.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.insurance_facilities.index')
            ->assertViewHas('insuranceFacilities');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_insurance_facility()
    {
        $response = $this->get(route('insurance-facilities.create'));

        $response->assertOk()->assertViewIs('app.insurance_facilities.create');
    }

    /**
     * @test
     */
    public function it_stores_the_insurance_facility()
    {
        $data = InsuranceFacility::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('insurance-facilities.store'), $data);

        $this->assertDatabaseHas('insurance_facilities', $data);

        $insuranceFacility = InsuranceFacility::latest('id')->first();

        $response->assertRedirect(
            route('insurance-facilities.edit', $insuranceFacility)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $response = $this->get(
            route('insurance-facilities.show', $insuranceFacility)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.insurance_facilities.show')
            ->assertViewHas('insuranceFacility');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $response = $this->get(
            route('insurance-facilities.edit', $insuranceFacility)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.insurance_facilities.edit')
            ->assertViewHas('insuranceFacility');
    }

    /**
     * @test
     */
    public function it_updates_the_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'jenis_asuransi' => $this->faker->text(255),
            'provider_asuransi' => $this->faker->text(255),
            'nama_peserta' => $this->faker->text(255),
            'status_peserta' => $this->faker->text(255),
            'date' => $this->faker->date,
            'peserta_manfaat' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('insurance-facilities.update', $insuranceFacility),
            $data
        );

        $data['id'] = $insuranceFacility->id;

        $this->assertDatabaseHas('insurance_facilities', $data);

        $response->assertRedirect(
            route('insurance-facilities.edit', $insuranceFacility)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $response = $this->delete(
            route('insurance-facilities.destroy', $insuranceFacility)
        );

        $response->assertRedirect(route('insurance-facilities.index'));

        $this->assertDeleted($insuranceFacility);
    }
}
