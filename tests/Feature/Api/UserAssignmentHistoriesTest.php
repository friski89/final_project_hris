<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssignmentHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAssignmentHistoriesTest extends TestCase
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
    public function it_gets_user_assignment_histories()
    {
        $user = User::factory()->create();
        $assignmentHistories = AssignmentHistory::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.assignment-histories.index', $user)
        );

        $response->assertOk()->assertSee($assignmentHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_assignment_histories()
    {
        $user = User::factory()->create();
        $data = AssignmentHistory::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.assignment-histories.store', $user),
            $data
        );

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $assignmentHistory = AssignmentHistory::latest('id')->first();

        $this->assertEquals($user->id, $assignmentHistory->user_id);
    }
}
