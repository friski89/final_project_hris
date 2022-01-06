<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Family;

use App\Models\Edu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FamilyTest extends TestCase
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
    public function it_gets_families_list()
    {
        $families = Family::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.families.index'));

        $response->assertOk()->assertSee($families[0]->employee_name);
    }

    /**
     * @test
     */
    public function it_stores_the_family()
    {
        $data = Family::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.families.store'), $data);

        $this->assertDatabaseHas('families', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_family()
    {
        $family = Family::factory()->create();

        $user = User::factory()->create();
        $edu = Edu::factory()->create();

        $data = [
            'employee_name' => $this->faker->text(255),
            'emp_no' => $this->faker->text(255),
            'marital_status' => 'Menikah',
            'no_kk' => $this->faker->text(255),
            'family_name' => $this->faker->text(255),
            'nik_id' => $this->faker->text(255),
            'place_of_birth' => $this->faker->text(255),
            'date_of_birth' => $this->faker->date,
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'date_marital' => $this->faker->date,
            'religion' => 'Islam',
            'citizenship' => $this->faker->text(255),
            'work' => $this->faker->text(255),
            'health_status' => $this->faker->randomNumber(0),
            'blood_group' => 'Tidak Tahu',
            'blood_rhesus' => $this->faker->text(255),
            'house_number' => $this->faker->text(255),
            'handphone_number' => $this->faker->text(255),
            'emergency_number' => $this->faker->text(255),
            'address' => $this->faker->text,
            'city' => $this->faker->city,
            'province' => $this->faker->text(255),
            'postal_code' => $this->faker->text(255),
            'relationship' => 'Suami',
            'alive' => $this->faker->randomNumber(0),
            'urutan' => $this->faker->randomNumber(0),
            'dependent_status' => $this->faker->randomNumber(0),
            'user_id' => $user->id,
            'edu_id' => $edu->id,
        ];

        $response = $this->putJson(
            route('api.families.update', $family),
            $data
        );

        $data['id'] = $family->id;

        $this->assertDatabaseHas('families', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_family()
    {
        $family = Family::factory()->create();

        $response = $this->deleteJson(route('api.families.destroy', $family));

        $this->assertSoftDeleted($family);

        $response->assertNoContent();
    }
}
