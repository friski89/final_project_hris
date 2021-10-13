<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Profile;
use App\Models\Religion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReligionProfilesTest extends TestCase
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
    public function it_gets_religion_profiles()
    {
        $religion = Religion::factory()->create();
        $profiles = Profile::factory()
            ->count(2)
            ->create([
                'religion_id' => $religion->id,
            ]);

        $response = $this->getJson(
            route('api.religions.profiles.index', $religion)
        );

        $response->assertOk()->assertSee($profiles[0]->phone_number);
    }

    /**
     * @test
     */
    public function it_stores_the_religion_profiles()
    {
        $religion = Religion::factory()->create();
        $data = Profile::factory()
            ->make([
                'religion_id' => $religion->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.religions.profiles.store', $religion),
            $data
        );

        $this->assertDatabaseHas('profiles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $profile = Profile::latest('id')->first();

        $this->assertEquals($religion->id, $profile->religion_id);
    }
}
