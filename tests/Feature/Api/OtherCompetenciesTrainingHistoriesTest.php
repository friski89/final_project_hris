<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;
use App\Models\OtherCompetencies;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCompetenciesTrainingHistoriesTest extends TestCase
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
    public function it_gets_other_competencies_training_histories()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();
        $trainingHistories = TrainingHistory::factory()
            ->count(2)
            ->create([
                'other_competencies_id' => $otherCompetencies->id,
            ]);

        $response = $this->getJson(
            route(
                'api.all-other-competencies.training-histories.index',
                $otherCompetencies
            )
        );

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_other_competencies_training_histories()
    {
        $otherCompetencies = OtherCompetencies::factory()->create();
        $data = TrainingHistory::factory()
            ->make([
                'other_competencies_id' => $otherCompetencies->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.all-other-competencies.training-histories.store',
                $otherCompetencies
            ),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $this->assertEquals(
            $otherCompetencies->id,
            $trainingHistory->other_competencies_id
        );
    }
}
