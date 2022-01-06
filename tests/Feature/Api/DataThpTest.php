<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DataThp;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataThpTest extends TestCase
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
    public function it_gets_data_thps_list()
    {
        $dataThps = DataThp::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.data-thps.index'));

        $response->assertOk()->assertSee($dataThps[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_data_thp()
    {
        $data = DataThp::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.data-thps.store'), $data);

        $this->assertDatabaseHas('data_thps', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.data-thps.update', $dataThp),
            $data
        );

        $data['id'] = $dataThp->id;

        $this->assertDatabaseHas('data_thps', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_data_thp()
    {
        $dataThp = DataThp::factory()->create();

        $response = $this->deleteJson(route('api.data-thps.destroy', $dataThp));

        $this->assertSoftDeleted($dataThp);

        $response->assertNoContent();
    }
}
