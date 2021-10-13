<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHome;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHomeTest extends TestCase
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
    public function it_gets_company_homes_list()
    {
        $companyHomes = CompanyHome::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.company-homes.index'));

        $response->assertOk()->assertSee($companyHomes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_company_home()
    {
        $data = CompanyHome::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.company-homes.store'), $data);

        $this->assertDatabaseHas('company_homes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.company-homes.update', $companyHome),
            $data
        );

        $data['id'] = $companyHome->id;

        $this->assertDatabaseHas('company_homes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_company_home()
    {
        $companyHome = CompanyHome::factory()->create();

        $response = $this->deleteJson(
            route('api.company-homes.destroy', $companyHome)
        );

        $this->assertSoftDeleted($companyHome);

        $response->assertNoContent();
    }
}
