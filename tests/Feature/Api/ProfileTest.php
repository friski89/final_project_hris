<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Profile;

use App\Models\Religion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
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
    public function it_gets_profiles_list()
    {
        $profiles = Profile::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.profiles.index'));

        $response->assertOk()->assertSee($profiles[0]->phone_number);
    }

    /**
     * @test
     */
    public function it_stores_the_profile()
    {
        $data = Profile::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.profiles.store'), $data);

        $this->assertDatabaseHas('profiles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.profiles.update', $profile),
            $data
        );

        $data['id'] = $profile->id;

        $this->assertDatabaseHas('profiles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_profile()
    {
        $profile = Profile::factory()->create();

        $response = $this->deleteJson(route('api.profiles.destroy', $profile));

        $this->assertDeleted($profile);

        $response->assertNoContent();
    }
}
