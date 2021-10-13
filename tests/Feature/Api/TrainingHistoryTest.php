<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;

use App\Models\OtherCompetencies;
use App\Models\CompetenceCoreValue;
use App\Models\CompetenceFanctional;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingHistoryTest extends TestCase
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
    public function it_gets_training_histories_list()
    {
        $trainingHistories = TrainingHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.training-histories.index'));

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_training_history()
    {
        $data = TrainingHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.training-histories.store'),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.training-histories.update', $trainingHistory),
            $data
        );

        $data['id'] = $trainingHistory->id;

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_training_history()
    {
        $trainingHistory = TrainingHistory::factory()->create();

        $response = $this->deleteJson(
            route('api.training-histories.destroy', $trainingHistory)
        );

        $this->assertSoftDeleted($trainingHistory);

        $response->assertNoContent();
    }
}
