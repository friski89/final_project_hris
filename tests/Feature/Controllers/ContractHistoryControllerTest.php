<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ContractHistory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_contract_histories()
    {
        $contractHistories = ContractHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('contract-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.contract_histories.index')
            ->assertViewHas('contractHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_contract_history()
    {
        $response = $this->get(route('contract-histories.create'));

        $response->assertOk()->assertViewIs('app.contract_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_contract_history()
    {
        $data = ContractHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('contract-histories.store'), $data);

        $this->assertDatabaseHas('contract_histories', $data);

        $contractHistory = ContractHistory::latest('id')->first();

        $response->assertRedirect(
            route('contract-histories.edit', $contractHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_contract_history()
    {
        $contractHistory = ContractHistory::factory()->create();

        $response = $this->get(
            route('contract-histories.show', $contractHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.contract_histories.show')
            ->assertViewHas('contractHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_contract_history()
    {
        $contractHistory = ContractHistory::factory()->create();

        $response = $this->get(
            route('contract-histories.edit', $contractHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.contract_histories.edit')
            ->assertViewHas('contractHistory');
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

        $response = $this->put(
            route('contract-histories.update', $contractHistory),
            $data
        );

        $data['id'] = $contractHistory->id;

        $this->assertDatabaseHas('contract_histories', $data);

        $response->assertRedirect(
            route('contract-histories.edit', $contractHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_contract_history()
    {
        $contractHistory = ContractHistory::factory()->create();

        $response = $this->delete(
            route('contract-histories.destroy', $contractHistory)
        );

        $response->assertRedirect(route('contract-histories.index'));

        $this->assertSoftDeleted($contractHistory);
    }
}
