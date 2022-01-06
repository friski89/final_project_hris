<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TrainingHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTrainingHistoriesTest extends TestCase
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
    public function it_gets_user_training_histories()
    {
        $user = User::factory()->create();
        $trainingHistories = TrainingHistory::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.training-histories.index', $user)
        );

        $response->assertOk()->assertSee($trainingHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_training_histories()
    {
        $user = User::factory()->create();
        $data = TrainingHistory::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.training-histories.store', $user),
            $data
        );

        $this->assertDatabaseHas('training_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $trainingHistory = TrainingHistory::latest('id')->first();

        $this->assertEquals($user->id, $trainingHistory->user_id);
    }
}
