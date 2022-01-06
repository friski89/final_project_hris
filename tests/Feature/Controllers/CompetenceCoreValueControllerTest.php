<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompetenceCoreValue;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceCoreValueControllerTest extends TestCase
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
    public function it_displays_index_view_with_competence_core_values()
    {
        $competenceCoreValues = CompetenceCoreValue::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competence-core-values.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_core_values.index')
            ->assertViewHas('competenceCoreValues');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competence_core_value()
    {
        $response = $this->get(route('competence-core-values.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.competence_core_values.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competence_core_value()
    {
        $data = CompetenceCoreValue::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competence-core-values.store'), $data);

        $this->assertDatabaseHas('competence_core_values', $data);

        $competenceCoreValue = CompetenceCoreValue::latest('id')->first();

        $response->assertRedirect(
            route('competence-core-values.edit', $competenceCoreValue)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $response = $this->get(
            route('competence-core-values.show', $competenceCoreValue)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_core_values.show')
            ->assertViewHas('competenceCoreValue');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $response = $this->get(
            route('competence-core-values.edit', $competenceCoreValue)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.competence_core_values.edit')
            ->assertViewHas('competenceCoreValue');
    }

    /**
     * @test
     */
    public function it_updates_the_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(
            route('competence-core-values.update', $competenceCoreValue),
            $data
        );

        $data['id'] = $competenceCoreValue->id;

        $this->assertDatabaseHas('competence_core_values', $data);

        $response->assertRedirect(
            route('competence-core-values.edit', $competenceCoreValue)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $response = $this->delete(
            route('competence-core-values.destroy', $competenceCoreValue)
        );

        $response->assertRedirect(route('competence-core-values.index'));

        $this->assertSoftDeleted($competenceCoreValue);
    }
}
