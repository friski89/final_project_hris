<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CashBenefit;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCashBenefitsTest extends TestCase
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
    public function it_gets_user_cash_benefits()
    {
        $user = User::factory()->create();
        $cashBenefits = CashBenefit::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.cash-benefits.index', $user)
        );

        $response->assertOk()->assertSee($cashBenefits[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_cash_benefits()
    {
        $user = User::factory()->create();
        $data = CashBenefit::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.cash-benefits.store', $user),
            $data
        );

        $this->assertDatabaseHas('cash_benefits', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $cashBenefit = CashBenefit::latest('id')->first();

        $this->assertEquals($user->id, $cashBenefit->user_id);
    }
}
