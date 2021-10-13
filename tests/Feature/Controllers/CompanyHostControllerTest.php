<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompanyHost;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHostControllerTest extends TestCase
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
    public function it_displays_index_view_with_company_hosts()
    {
        $companyHosts = CompanyHost::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('company-hosts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.company_hosts.index')
            ->assertViewHas('companyHosts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_company_host()
    {
        $response = $this->get(route('company-hosts.create'));

        $response->assertOk()->assertViewIs('app.company_hosts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_company_host()
    {
        $data = CompanyHost::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('company-hosts.store'), $data);

        $this->assertDatabaseHas('company_hosts', $data);

        $companyHost = CompanyHost::latest('id')->first();

        $response->assertRedirect(route('company-hosts.edit', $companyHost));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_company_host()
    {
        $companyHost = CompanyHost::factory()->create();

        $response = $this->get(route('company-hosts.show', $companyHost));

        $response
            ->assertOk()
            ->assertViewIs('app.company_hosts.show')
            ->assertViewHas('companyHost');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_company_host()
    {
        $companyHost = CompanyHost::factory()->create();

        $response = $this->get(route('company-hosts.edit', $companyHost));

        $response
            ->assertOk()
            ->assertViewIs('app.company_hosts.edit')
            ->assertViewHas('companyHost');
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

        $response = $this->put(
            route('company-hosts.update', $companyHost),
            $data
        );

        $data['id'] = $companyHost->id;

        $this->assertDatabaseHas('company_hosts', $data);

        $response->assertRedirect(route('company-hosts.edit', $companyHost));
    }

    /**
     * @test
     */
    public function it_deletes_the_company_host()
    {
        $companyHost = CompanyHost::factory()->create();

        $response = $this->delete(route('company-hosts.destroy', $companyHost));

        $response->assertRedirect(route('company-hosts.index'));

        $this->assertSoftDeleted($companyHost);
    }
}
