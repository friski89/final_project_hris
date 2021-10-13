<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;
use App\Models\CompetenceLeadership;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceLeadershipTrainingHistoriesTest extends TestCase
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
    public function it_gets_competence_leadership_training_histories()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $trainingHistories = TrainingHistory::factory()
            ->count(2)
            ->create([
                'competence_leadership_id' => $competenceLeadership->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competence-leaderships.training-histories.index',
                $competenceLeadership
            )
        );

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_leadership_training_histories()
    {
        $competenceLeadership = CompetenceLeadership::factory()->create();
        $data = TrainingHistory::factory()
            ->make([
                'competence_leadership_id' => $competenceLeadership->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competence-leaderships.training-histories.store',
                $competenceLeadership
            ),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $this->assertEquals(
            $competenceLeadership->id,
            $trainingHistory->competence_leadership_id
        );
    }
}
