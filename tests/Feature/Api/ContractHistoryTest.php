<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ContractHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractHistoryTest extends TestCase
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
    public function it_gets_contract_histories_list()
    {
        $contractHistories = ContractHistory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contract-histories.index'));

        $response->assertOk()->assertSee($contractHistories[0]->tanggal);
    }

    /**
     * @test
     */
    public function it_stores_the_contract_history()
    {
        $data = ContractHistory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.contract-histories.store'),
            $data
        );

        $this->assertDatabaseHas('contract_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_contract_history()
    {
        $contractHistory = ContractHistory::factory()->create();

        $user = User::factory()->create();

        $data = [
            'tanggal' => $this->faker->date,
            'status' => $this->faker->word,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.contract-histories.update', $contractHistory),
            $data
        );

        $data['id'] = $contractHistory->id;

        $this->assertDatabaseHas('contract_histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contract_history()
    {
        $contractHistory = ContractHistory::factory()->create();

        $response = $this->deleteJson(
            route('api.contract-histories.destroy', $contractHistory)
        );

        $this->assertSoftDeleted($contractHistory);

        $response->assertNoContent();
    }
}
