<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Family;

use App\Models\Edu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FamilyControllerTest extends TestCase
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
    public function it_displays_index_view_with_families()
    {
        $families = Family::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('families.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.families.index')
            ->assertViewHas('families');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_family()
    {
        $response = $this->get(route('families.create'));

        $response->assertOk()->assertViewIs('app.families.create');
    }

    /**
     * @test
     */
    public function it_stores_the_family()
    {
        $data = Family::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('families.store'), $data);

        $this->assertDatabaseHas('families', $data);

        $family = Family::latest('id')->first();

        $response->assertRedirect(route('families.edit', $family));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_family()
    {
        $family = Family::factory()->create();

        $response = $this->get(route('families.show', $family));

        $response
            ->assertOk()
            ->assertViewIs('app.families.show')
            ->assertViewHas('family');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_family()
    {
        $family = Family::factory()->create();

        $response = $this->get(route('families.edit', $family));

        $response
            ->assertOk()
            ->assertViewIs('app.families.edit')
            ->assertViewHas('family');
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

        $response = $this->put(route('families.update', $family), $data);

        $data['id'] = $family->id;

        $this->assertDatabaseHas('families', $data);

        $response->assertRedirect(route('families.edit', $family));
    }

    /**
     * @test
     */
    public function it_deletes_the_family()
    {
        $family = Family::factory()->create();

        $response = $this->delete(route('families.destroy', $family));

        $response->assertRedirect(route('families.index'));

        $this->assertSoftDeleted($family);
    }
}
