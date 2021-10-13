<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;
use App\Models\CompetenceCoreValue;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceCoreValueTrainingHistoriesTest extends TestCase
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
    public function it_gets_competence_core_value_training_histories()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();
        $trainingHistories = TrainingHistory::factory()
            ->count(2)
            ->create([
                'competence_core_value_id' => $competenceCoreValue->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-core-values.training-histories.index',
                $competenceCoreValue
            )
        );

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_core_value_training_histories()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();
        $data = TrainingHistory::factory()
            ->make([
                'competence_core_value_id' => $competenceCoreValue->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-core-values.training-histories.store',
                $competenceCoreValue
            ),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $this->assertEquals(
            $competenceCoreValue->id,
            $trainingHistory->competence_core_value_id
        );
    }
}
