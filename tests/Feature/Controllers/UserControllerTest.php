<?php

namespace Tests\Feature\Controllers;

use App\Models\User;

use App\Models\Edu;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\JobGrade;
use App\Models\Division;
use App\Models\JobTitle;
use App\Models\JobFamily;
use App\Models\SubStatus;
use App\Models\Direktorat;
use App\Models\JobFunction;
use App\Models\CityRecuite;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\Departement;
use App\Models\BandPosition;
use App\Models\WorkLocation;
use App\Models\StatusEmployee;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
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
    public function it_displays_index_view_with_users()
    {
        $users = User::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('users.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.users.index')
            ->assertViewHas('users');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_user()
    {
        $response = $this->get(route('users.create'));

        $response->assertOk()->assertViewIs('app.users.create');
    }

    /**
     * @test
     */
    public function it_stores_the_user()
    {
        $data = User::factory()
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->post(route('users.store'), $data);

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $user = User::latest('id')->first();

        $response->assertRedirect(route('users.edit', $user));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user));

        $response
            ->assertOk()
            ->assertViewIs('app.users.show')
            ->assertViewHas('user');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response
            ->assertOk()
            ->assertViewIs('app.users.edit')
            ->assertViewHas('user');
    }

    /**
     * @test
     */
    public function it_updates_the_user()
    {
        $user = User::factory()->create();

        $bandPosition = BandPosition::factory()->create();
        $jobGrade = JobGrade::factory()->create();
        $jobFamily = JobFamily::factory()->create();
        $jobFunction = JobFunction::factory()->create();
        $cityRecuite = CityRecuite::factory()->create();
        $statusEmployee = StatusEmployee::factory()->create();
        $companyHome = CompanyHome::factory()->create();
        $companyHost = CompanyHost::factory()->create();
        $subStatus = SubStatus::factory()->create();
        $unit = Unit::factory()->create();
        $division = Division::factory()->create();
        $workLocation = WorkLocation::factory()->create();
        $jobTitle = JobTitle::factory()->create();
        $edu = Edu::factory()->create();
        $direktorat = Direktorat::factory()->create();
        $departement = Departement::factory()->create();
        $jabatan = Jabatan::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'nik_telkom' => $this->faker->text(255),
            'nik_company' => $this->faker->text(255),
            'date_in' => $this->faker->date,
            'date_sk' => $this->faker->date,
            'place_of_birth' => $this->faker->text(150),
            'date_of_birth' => $this->faker->date,
            'age' => $this->faker->randomNumber(0),
            'tanggal_kartap' => $this->faker->date,
            'no_sk_kartap' => $this->faker->text(255),
            'band_position_id' => $bandPosition->id,
            'job_grade_id' => $jobGrade->id,
            'job_family_id' => $jobFamily->id,
            'job_function_id' => $jobFunction->id,
            'city_recuite_id' => $cityRecuite->id,
            'status_employee_id' => $statusEmployee->id,
            'company_home_id' => $companyHome->id,
            'company_host_id' => $companyHost->id,
            'sub_status_id' => $subStatus->id,
            'unit_id' => $unit->id,
            'division_id' => $division->id,
            'work_location_id' => $workLocation->id,
            'job_title_id' => $jobTitle->id,
            'edu_id' => $edu->id,
            'direktorat_id' => $direktorat->id,
            'departement_id' => $departement->id,
            'jabatan_id' => $jabatan->id,
        ];

        $data['password'] = \Str::random('8');

        $response = $this->put(route('users.update', $user), $data);

        unset($data['password']);
        unset($data['email_verified_at']);

        $data['id'] = $user->id;

        $this->assertDatabaseHas('users', $data);

        $response->assertRedirect(route('users.edit', $user));
    }

    /**
     * @test
     */
    public function it_deletes_the_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));

        $this->assertSoftDeleted($user);
    }
}
