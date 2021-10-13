<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Regencie;

use App\Models\Province;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegencieControllerTest extends TestCase
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
    public function it_displays_index_view_with_regencies()
    {
        $regencies = Regencie::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('regencies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.regencies.index')
            ->assertViewHas('regencies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_regencie()
    {
        $response = $this->get(route('regencies.create'));

        $response->assertOk()->assertViewIs('app.regencies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_regencie()
    {
        $data = Regencie::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('regencies.store'), $data);

        $this->assertDatabaseHas('regencies', $data);

        $regencie = Regencie::latest('id')->first();

        $response->assertRedirect(route('regencies.edit', $regencie));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_regencie()
    {
        $regencie = Regencie::factory()->create();

        $response = $this->get(route('regencies.show', $regencie));

        $response
            ->assertOk()
            ->assertViewIs('app.regencies.show')
            ->assertViewHas('regencie');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_regencie()
    {
        $regencie = Regencie::factory()->create();

        $response = $this->get(route('regencies.edit', $regencie));

        $response
            ->assertOk()
            ->assertViewIs('app.regencies.edit')
            ->assertViewHas('regencie');
    }

    /**
     * @test
     */
    public function it_updates_the_regencie()
    {
        $regencie = Regencie::factory()->create();

        $province = Province::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'province_id' => $province->id,
        ];

        $response = $this->put(route('regencies.update', $regencie), $data);

        $data['id'] = $regencie->id;

        $this->assertDatabaseHas('regencies', $data);

        $response->assertRedirect(route('regencies.edit', $regencie));
    }

    /**
     * @test
     */
    public function it_deletes_the_regencie()
    {
        $regencie = Regencie::factory()->create();

        $response = $this->delete(route('regencies.destroy', $regencie));

        $response->assertRedirect(route('regencies.index'));

        $this->assertSoftDeleted($regencie);
    }
}
