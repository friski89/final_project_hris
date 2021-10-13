<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceLeadershipControllerTest extends TestCase
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
    public function it_displays_index_view_with_competence_leaderships()
    {
        $competenceLeaderships = CompetenceLeadership::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competence-leaderships.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_leaderships.index')
            ->assertViewHas('competenceLeaderships');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competence_leadership()
    {
        $response = $this->get(route('competence-leaderships.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_leaderships.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competence_leadership()
    {
        $data = CompetenceLeadership::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competence-leaderships.store'), $data);

        $this->assertDatabaseHas('competence_leaderships', $data);

        $competenceLeadership = CompetenceLeadership::latest('id')->first();

        $response->assertRedirect(
            route('competence-leaderships.edit', $competenceLeadership)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $response = $this->get(
            route('competence-leaderships.show', $competenceLeadership)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_leaderships.show')
            ->assertViewHas('competenceLeadership');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $response = $this->get(
            route('competence-leaderships.edit', $competenceLeadership)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_leaderships.edit')
            ->assertViewHas('competenceLeadership');
    }

    /**
     * @test
     */
    public function it_updates_the_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('competence-leaderships.update', $competenceLeadership),
            $data
        );

        $data['id'] = $competenceLeadership->id;

        $this->assertDatabaseHas('competence_leaderships', $data);

        $response->assertRedirect(
            route('competence-leaderships.edit', $competenceLeadership)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_leadership()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();

        $response = $this->delete(
            route('competence-leaderships.destroy', $competenceLeadership)
        );

        $response->assertRedirect(route('competence-leaderships.index'));

        $this->assertSoftDeleted($competenceLeadership);
    }
}
