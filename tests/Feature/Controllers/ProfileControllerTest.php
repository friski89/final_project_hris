<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Profile;

use App\Models\Religion;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileControllerTest extends TestCase
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
    public function it_displays_index_view_with_profiles()
    {
        $profiles = Profile::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('profiles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.index')
            ->assertViewHas('profiles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_profile()
    {
        $response = $this->get(route('profiles.create'));

        $response->assertOk()->assertViewIs('app.profiles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_profile()
    {
        $data = Profile::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('profiles.store'), $data);

        $this->assertDatabaseHas('profiles', $data);

        $profile = Profile::latest('id')->first();

        $response->assertRedirect(route('profiles.edit', $profile));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_profile()
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profiles.show', $profile));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.show')
            ->assertViewHas('profile');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_profile()
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profiles.edit', $profile));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.edit')
            ->assertViewHas('profile');
    }

    /**
     * @test
     */
    public function it_updates_the_profile()
    {
        $profile = Profile::factory()->create();

        $user = User::factory()->create();
        $religion = Religion::factory()->create();

        $data = [
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'phone_number' => $this->faker->phoneNumber,
            'blood_group' => 'Tidak Tahu',
            'no_ktp' => $this->faker->text(30),
            'no_npwp' => $this->faker->text(30),
            'address_ktp' => $this->faker->text,
            'address_domisili' => $this->faker->text,
            'status_domisili' => 'Rumah Sendiri',
            'address_npwp' => $this->faker->text(255),
            'nama_ibu' => $this->faker->text(255),
            'user_id' => $user->id,
            'religion_id' => $religion->id,
        ];

        $response = $this->put(route('profiles.update', $profile), $data);

        $data['id'] = $profile->id;

        $this->assertDatabaseHas('profiles', $data);

        $response->assertRedirect(route('profiles.edit', $profile));
    }

    /**
     * @test
     */
    public function it_deletes_the_profile()
    {
        $profile = Profile::factory()->create();

        $response = $this->delete(route('profiles.destroy', $profile));

        $response->assertRedirect(route('profiles.index'));

        $this->assertDeleted($profile);
    }
}
