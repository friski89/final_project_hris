<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Division;

use App\Models\Direktorat;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DivisionControllerTest extends TestCase
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
    public function it_displays_index_view_with_divisions()
    {
        $divisions = Division::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('divisions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.divisions.index')
            ->assertViewHas('divisions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_division()
    {
        $response = $this->get(route('divisions.create'));

        $response->assertOk()->assertViewIs('app.divisions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_division()
    {
        $data = Division::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('divisions.store'), $data);

        $this->assertDatabaseHas('divisions', $data);

        $division = Division::latest('id')->first();

        $response->assertRedirect(route('divisions.edit', $division));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_division()
    {
        $division = Division::factory()->create();

        $response = $this->get(route('divisions.show', $division));

        $response
            ->assertOk()
            ->assertViewIs('app.divisions.show')
            ->assertViewHas('division');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_division()
    {
        $division = Division::factory()->create();

        $response = $this->get(route('divisions.edit', $division));

        $response
            ->assertOk()
            ->assertViewIs('app.divisions.edit')
            ->assertViewHas('division');
    }

    /**
     * @test
     */
    public function it_updates_the_division()
    {
        $division = Division::factory()->create();

        $direktorat = Direktorat::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'direktorat_id' => $direktorat->id,
        ];

        $response = $this->put(route('divisions.update', $division), $data);

        $data['id'] = $division->id;

        $this->assertDatabaseHas('divisions', $data);

        $response->assertRedirect(route('divisions.edit', $division));
    }

    /**
     * @test
     */
    public function it_deletes_the_division()
    {
        $division = Division::factory()->create();

        $response = $this->delete(route('divisions.destroy', $division));

        $response->assertRedirect(route('divisions.index'));

        $this->assertSoftDeleted($division);
    }
}
