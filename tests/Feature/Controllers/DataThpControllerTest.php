<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DataThp;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataThpControllerTest extends TestCase
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
    public function it_displays_index_view_with_data_thps()
    {
        $dataThps = DataThp::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('data-thps.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.data_thps.index')
            ->assertViewHas('dataThps');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_data_thp()
    {
        $response = $this->get(route('data-thps.create'));

        $response->assertOk()->assertViewIs('app.data_thps.create');
    }

    /**
     * @test
     */
    public function it_stores_the_data_thp()
    {
        $data = DataThp::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('data-thps.store'), $data);

        $this->assertDatabaseHas('data_thps', $data);

        $dataThp = DataThp::latest('id')->first();

        $response->assertRedirect(route('data-thps.edit', $dataThp));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_data_thp()
    {
        $dataThp = DataThp::factory()->create();

        $response = $this->get(route('data-thps.show', $dataThp));

        $response
            ->assertOk()
            ->assertViewIs('app.data_thps.show')
            ->assertViewHas('dataThp');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_data_thp()
    {
        $dataThp = DataThp::factory()->create();

        $response = $this->get(route('data-thps.edit', $dataThp));

        $response
            ->assertOk()
            ->assertViewIs('app.data_thps.edit')
            ->assertViewHas('dataThp');
    }

    /**
     * @test
     */
    public function it_updates_the_data_thp()
    {
        $dataThp = DataThp::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'base_salary' => $this->faker->randomNumber,
            'tunjangan_jabatan' => $this->faker->randomNumber,
            'tunjangan_fixed' => $this->faker->randomNumber,
            'based_jamsostek' => $this->faker->randomNumber,
            'no_jamsostek' => $this->faker->text(255),
            'no_bpjs' => $this->faker->text(255),
            'no_npwp' => $this->faker->randomNumber,
            'status_pajak' => $this->faker->randomNumber(0),
            'no_rekening' => $this->faker->randomNumber,
            'nama_bank' => $this->faker->text(255),
            'nama_pemilik' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('data-thps.update', $dataThp), $data);

        $data['id'] = $dataThp->id;

        $this->assertDatabaseHas('data_thps', $data);

        $response->assertRedirect(route('data-thps.edit', $dataThp));
    }

    /**
     * @test
     */
    public function it_deletes_the_data_thp()
    {
        $dataThp = DataThp::factory()->create();

        $response = $this->delete(route('data-thps.destroy', $dataThp));

        $response->assertRedirect(route('data-thps.index'));

        $this->assertSoftDeleted($dataThp);
    }
}
