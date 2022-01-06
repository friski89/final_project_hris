<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CashBenefit;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CashBenefitTest extends TestCase
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
    public function it_gets_cash_benefits_list()
    {
        $cashBenefits = CashBenefit::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cash-benefits.index'));

        $response->assertOk()->assertSee($cashBenefits[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_cash_benefit()
    {
        $data = CashBenefit::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cash-benefits.store'), $data);

        $this->assertDatabaseHas('cash_benefits', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_cash_benefit()
    {
        $cashBenefit = CashBenefit::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'jenis_benefit' => $this->faker->text(255),
            'nilai_benefit' => $this->faker->text(255),
            'date' => $this->faker->date,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.cash-benefits.update', $cashBenefit),
            $data
        );

        $data['id'] = $cashBenefit->id;

        $this->assertDatabaseHas('cash_benefits', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_cash_benefit()
    {
        $cashBenefit = CashBenefit::factory()->create();

        $response = $this->deleteJson(
            route('api.cash-benefits.destroy', $cashBenefit)
        );

        $this->assertDeleted($cashBenefit);

        $response->assertNoContent();
    }
}
