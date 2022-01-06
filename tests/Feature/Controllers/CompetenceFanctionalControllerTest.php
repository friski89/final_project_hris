<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompetenceFanctional;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceFanctionalControllerTest extends TestCase
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
    public function it_displays_index_view_with_competence_fanctionals()
    {
        $competenceFanctionals = CompetenceFanctional::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competence-fanctionals.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_fanctionals.index')
            ->assertViewHas('competenceFanctionals');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competence_fanctional()
    {
        $response = $this->get(route('competence-fanctionals.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_fanctionals.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competence_fanctional()
    {
        $data = CompetenceFanctional::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competence-fanctionals.store'), $data);

        $this->assertDatabaseHas('competence_fanctionals', $data);

        $competenceFanctional = CompetenceFanctional::latest('id')->first();

        $response->assertRedirect(
            route('competence-fanctionals.edit', $competenceFanctional)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $response = $this->get(
            route('competence-fanctionals.show', $competenceFanctional)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_fanctionals.show')
            ->assertViewHas('competenceFanctional');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $response = $this->get(
            route('competence-fanctionals.edit', $competenceFanctional)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_fanctionals.edit')
            ->assertViewHas('competenceFanctional');
    }

    /**
     * @test
     */
    public function it_updates_the_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('competence-fanctionals.update', $competenceFanctional),
            $data
        );

        $data['id'] = $competenceFanctional->id;

        $this->assertDatabaseHas('competence_fanctionals', $data);

        $response->assertRedirect(
            route('competence-fanctionals.edit', $competenceFanctional)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_fanctional()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();

        $response = $this->delete(
            route('competence-fanctionals.destroy', $competenceFanctional)
        );

        $response->assertRedirect(route('competence-fanctionals.index'));

        $this->assertSoftDeleted($competenceFanctional);
    }
}
