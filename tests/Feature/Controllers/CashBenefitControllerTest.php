<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CashBenefit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CashBenefitControllerTest extends TestCase
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
    public function it_displays_index_view_with_cash_benefits()
    {
        $cashBenefits = CashBenefit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('cash-benefits.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.cash_benefits.index')
            ->assertViewHas('cashBenefits');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_cash_benefit()
    {
        $response = $this->get(route('cash-benefits.create'));

        $response->assertOk()->assertViewIs('app.cash_benefits.create');
    }

    /**
     * @test
     */
    public function it_stores_the_cash_benefit()
    {
        $data = CashBenefit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('cash-benefits.store'), $data);

        $this->assertDatabaseHas('cash_benefits', $data);

        $cashBenefit = CashBenefit::latest('id')->first();

        $response->assertRedirect(route('cash-benefits.edit', $cashBenefit));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_cash_benefit()
    {
        $cashBenefit = CashBenefit::factory()->create();

        $response = $this->get(route('cash-benefits.show', $cashBenefit));

        $response
            ->assertOk()
            ->assertViewIs('app.cash_benefits.show')
            ->assertViewHas('cashBenefit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_cash_benefit()
    {
        $cashBenefit = CashBenefit::factory()->create();

        $response = $this->get(route('cash-benefits.edit', $cashBenefit));

        $response
            ->assertOk()
            ->assertViewIs('app.cash_benefits.edit')
            ->assertViewHas('cashBenefit');
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

        $response = $this->put(
            route('cash-benefits.update', $cashBenefit),
            $data
        );

        $data['id'] = $cashBenefit->id;

        $this->assertDatabaseHas('cash_benefits', $data);

        $response->assertRedirect(route('cash-benefits.edit', $cashBenefit));
    }

    /**
     * @test
     */
    public function it_deletes_the_cash_benefit()
    {
        $cashBenefit = CashBenefit::factory()->create();

        $response = $this->delete(route('cash-benefits.destroy', $cashBenefit));

        $response->assertRedirect(route('cash-benefits.index'));

        $this->assertDeleted($cashBenefit);
    }
}
