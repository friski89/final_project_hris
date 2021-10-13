<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OfficeFacilities;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficeFacilitiesTest extends TestCase
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
    public function it_gets_all_office_facilities_list()
    {
        $allOfficeFacilities = OfficeFacilities::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-office-facilities.index'));

        $response->assertOk()->assertSee($allOfficeFacilities[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_office_facilities()
    {
        $data = OfficeFacilities::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-office-facilities.store'),
            $data
        );

        $this->assertDatabaseHas('office_facilities', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $user = User::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'jenis_fasilitas' => $this->faker->text(255),
            'jenis_pemberian' => $this->faker->text(255),
            'nilai_perolehan' => $this->faker->text(255),
            'date' => $this->faker->date,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.all-office-facilities.update', $officeFacilities),
            $data
        );

        $data['id'] = $officeFacilities->id;

        $this->assertDatabaseHas('office_facilities', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_office_facilities()
    {
        $officeFacilities = OfficeFacilities::factory()->create();

        $response = $this->deleteJson(
            route('api.all-office-facilities.destroy', $officeFacilities)
        );

        $this->assertDeleted($officeFacilities);

        $response->assertNoContent();
    }
}
