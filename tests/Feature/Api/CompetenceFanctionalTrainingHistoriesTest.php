<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;
use App\Models\CompetenceFanctional;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceFanctionalTrainingHistoriesTest extends TestCase
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
    public function it_gets_competence_fanctional_training_histories()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $trainingHistories = TrainingHistory::factory()
            ->count(2)
            ->create([
                'competence_fanctional_id' => $competenceFanctional->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-fanctionals.training-histories.index',
                $competenceFanctional
            )
        );

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_fanctional_training_histories()
    {
        $competenceFanctional = CompetenceFanctional::factory()->create();
        $data = TrainingHistory::factory()
            ->make([
                'competence_fanctional_id' => $competenceFanctional->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-fanctionals.training-histories.store',
                $competenceFanctional
            ),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $this->assertEquals(
            $competenceFanctional->id,
            $trainingHistory->competence_fanctional_id
        );
    }
}
