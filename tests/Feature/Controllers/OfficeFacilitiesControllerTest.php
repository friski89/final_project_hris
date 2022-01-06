<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OfficeFacilities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficeFacilitiesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_office_facilities()
    {
        $allOfficeFacilities = OfficeFacilities::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-office-facilities.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_office_facilities.index')
            ->assertViewHas('allOfficeFacilities');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_office_facilities()
    {
        $response = $this->get(route('all-office-facilities.create'));

        $response->assertOk()->assertViewIs('app.all_office_facilities.create');
    }

    /**
     * @test
     */
    public function it_stores_the_office_facilities()
    {
        $data = OfficeFacilities::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-office-facilities.store'), $data);

        $this->assertDatabaseHas('office_facilities', $data);

        $officeFacilities = OfficeFacilities::latest('id')->first();

        $response->assertRedirect(
            route('all-office-facilities.edit', $officeFacilities)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $response = $this->get(
            route('all-office-facilities.show', $officeFacilities)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_office_facilities.show')
            ->assertViewHas('officeFacilities');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $response = $this->get(
            route('all-office-facilities.edit', $officeFacilities)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_office_facilities.edit')
            ->assertViewHas('officeFacilities');
    }

    /**
     * @test
     */
    public function it_updates_the_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'jenis_fasilitas' => $this->faker->text(255),
            'jenis_pemberian' => $this->faker->text(255),
            'nilai_perolehan' => $this->faker->text(255),
            'date' => $this->faker->date,
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('all-office-facilities.update', $officeFacilities),
            $data
        );

        $data['id'] = $officeFacilities->id;

        $this->assertDatabaseHas('office_facilities', $data);

        $response->assertRedirect(
            route('all-office-facilities.edit', $officeFacilities)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $response = $this->delete(
            route('all-office-facilities.destroy', $officeFacilities)
        );

        $response->assertRedirect(route('all-office-facilities.index'));

        $this->assertDeleted($officeFacilities);
    }
}
