<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OtherCompetencies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCompetenciesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_other_competencies()
    {
        $allOtherCompetencies = OtherCompetencies::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-other-competencies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_other_competencies.index')
            ->assertViewHas('allOtherCompetencies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_other_competencies()
    {
        $response = $this->get(route('all-other-competencies.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_other_competencies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_other_competencies()
    {
        $data = OtherCompetencies::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-other-competencies.store'), $data);

        $this->assertDatabaseHas('other_competencies', $data);

        $otherCompetencies = OtherCompetencies::latest('id')->first();

        $response->assertRedirect(
            route('all-other-competencies.edit', $otherCompetencies)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $response = $this->get(
            route('all-other-competencies.show', $otherCompetencies)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_other_competencies.show')
            ->assertViewHas('otherCompetencies');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $response = $this->get(
            route('all-other-competencies.edit', $otherCompetencies)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_other_competencies.edit')
            ->assertViewHas('otherCompetencies');
    }

    /**
     * @test
     */
    public function it_updates_the_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('all-other-competencies.update', $otherCompetencies),
            $data
        );

        $data['id'] = $otherCompetencies->id;

        $this->assertDatabaseHas('other_competencies', $data);

        $response->assertRedirect(
            route('all-other-competencies.edit', $otherCompetencies)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_other_competencies()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();

        $response = $this->delete(
            route('all-other-competencies.destroy', $otherCompetencies)
        );

        $response->assertRedirect(route('all-other-competencies.index'));

        $this->assertSoftDeleted($otherCompetencies);
    }
}
