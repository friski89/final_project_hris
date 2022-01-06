<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TrainingHistory;

use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_training_histories()
    {
        $trainingHistories = TrainingHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('training-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.training_histories.index')
            ->assertViewHas('trainingHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_training_history()
    {
        $response = $this->get(route('training-histories.create'));

        $response->assertOk()->assertViewIs('app.training_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_training_history()
    {
        $data = TrainingHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('training-histories.store'), $data);

        $this->assertDatabaseHas('training_histories', $data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $response->assertRedirect(
            route('training-histories.edit', $trainingHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_training_history()
    {
        $trainingHistory = TrainingHistory::factory()->create();

        $response = $this->get(
            route('training-histories.show', $trainingHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.training_histories.show')
            ->assertViewHas('trainingHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_training_history()
    {
        $trainingHistory = TrainingHistory::factory()->create();

        $response = $this->get(
            route('training-histories.edit', $trainingHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.training_histories.edit')
            ->assertViewHas('trainingHistory');
    }

    /**
     * @test
     */
    public function it_updates_the_training_history()
    {
        $trainingHistory = TrainingHistory::factory()->create();

        $user = User::factory()->create();
        $otherCompetencies = OtherCompetencies::factory()->create();
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'training_name' => $this->faker->text(255),
            'institution' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'years_of_training' => $this->faker->text(255),
            'training_duration' => $this->faker->text(255),
            'end_date' => $this->faker->date,
            'training_force' => $this->faker->text(255),
            'rating' => $this->faker->text(255),
            'trnevent_topic' => $this->faker->text(255),
            'trncourse_cost' => $this->faker->text(255),
            'trnevent_type' => $this->faker->text(255),
            'trn_flag' => $this->faker->text(255),
            'user_id' => $user->id,
            'other_competencies_id' => $otherCompetencies->id,
            'competence_fanctional_id' => $competenceFanctional->id,
            'competence_leadership_id' => $competenceLeadership->id,
            'competence_core_value_id' => $competenceCoreValue->id,
        ];

        $response = $this->put(
            route('training-histories.update', $trainingHistory),
            $data
        );

        $data['id'] = $trainingHistory->id;

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertRedirect(
            route('training-histories.edit', $trainingHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_training_history()
    {
        $trainingHistory = TrainingHistory::factory()->create();

        $response = $this->delete(
            route('training-histories.destroy', $trainingHistory)
        );

        $response->assertRedirect(route('training-histories.index'));

        $this->assertSoftDeleted($trainingHistory);
    }
}
