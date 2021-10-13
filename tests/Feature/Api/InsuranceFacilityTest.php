<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\InsuranceFacility;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsuranceFacilityTest extends TestCase
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
    public function it_gets_insurance_facilities_list()
    {
        $insuranceFacilities = InsuranceFacility::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.insurance-facilities.index'));

        $response->assertOk()->assertSee($insuranceFacilities[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_insurance_facility()
    {
        $data = InsuranceFacility::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.insurance-facilities.store'),
            $data
        );

        $this->assertDatabaseHas('insurance_facilities', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'jenis_asuransi' => $this->faker->text(255),
            'provider_asuransi' => $this->faker->text(255),
            'nama_peserta' => $this->faker->text(255),
            'status_peserta' => $this->faker->text(255),
            'date' => $this->faker->date,
            'peserta_manfaat' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.insurance-facilities.update', $insuranceFacility),
            $data
        );

        $data['id'] = $insuranceFacility->id;

        $this->assertDatabaseHas('insurance_facilities', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_insurance_facility()
    {
        $insuranceFacility = InsuranceFacility::factory()->create();

        $response = $this->deleteJson(
            route('api.insurance-facilities.destroy', $insuranceFacility)
        );

        $this->assertDeleted($insuranceFacility);

        $response->assertNoContent();
    }
}
