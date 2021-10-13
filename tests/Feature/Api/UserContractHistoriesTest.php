<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ContractHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserContractHistoriesTest extends TestCase
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
    public function it_gets_user_contract_histories()
    {
        $user = User::factory()->create();
        $contractHistories = ContractHistory::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.contract-histories.index', $user)
        );

        $response->assertOk()->assertSee($contractHistories[0]->tanggal);
    }

    /**
     * @test
     */
    public function it_stores_the_user_contract_histories()
    {
        $user = User::factory()->create();
        $data = ContractHistory::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.contract-histories.store', $user),
            $data
        );

        $this->assertDatabaseHas('contract_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contractHistory = ContractHistory::latest('id')->first();

        $this->assertEquals($user->id, $contractHistory->user_id);
    }
}
