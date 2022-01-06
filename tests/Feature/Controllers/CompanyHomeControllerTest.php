<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompanyHome;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHomeControllerTest extends TestCase
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
    public function it_displays_index_view_with_company_homes()
    {
        $companyHomes = CompanyHome::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('company-homes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.company_homes.index')
            ->assertViewHas('companyHomes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_company_home()
    {
        $response = $this->get(route('company-homes.create'));

        $response->assertOk()->assertViewIs('app.company_homes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_company_home()
    {
        $data = CompanyHome::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('company-homes.store'), $data);

        $this->assertDatabaseHas('company_homes', $data);

        $companyHome = CompanyHome::latest('id')->first();

        $response->assertRedirect(route('company-homes.edit', $companyHome));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_company_home()
    {
        $companyHome = CompanyHome::factory()->create();

        $response = $this->get(route('company-homes.show', $companyHome));

        $response
            ->assertOk()
            ->assertViewIs('app.company_homes.show')
            ->assertViewHas('companyHome');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_company_home()
    {
        $companyHome = CompanyHome::factory()->create();

        $response = $this->get(route('company-homes.edit', $companyHome));

        $response
            ->assertOk()
            ->assertViewIs('app.company_homes.edit')
            ->assertViewHas('companyHome');
    }

    /**
     * @test
     */
    public function it_updates_the_company_home()
    {
        $companyHome = CompanyHome::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('company-homes.update', $companyHome),
            $data
        );

        $data['id'] = $companyHome->id;

        $this->assertDatabaseHas('company_homes', $data);

        $response->assertRedirect(route('company-homes.edit', $companyHome));
    }

    /**
     * @test
     */
    public function it_deletes_the_company_home()
    {
        $companyHome = CompanyHome::factory()->create();

        $response = $this->delete(route('company-homes.destroy', $companyHome));

        $response->assertRedirect(route('company-homes.index'));

        $this->assertSoftDeleted($companyHome);
    }
}
