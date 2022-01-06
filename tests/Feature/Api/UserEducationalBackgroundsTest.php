<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EducationalBackground;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEducationalBackgroundsTest extends TestCase
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
    public function it_gets_user_educational_backgrounds()
    {
        $user = User::factory()->create();
        $educationalBackgrounds = EducationalBackground::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.educational-backgrounds.index', $user)
        );

        $response->assertOk()->assertSee($educationalBackgrounds[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_educational_backgrounds()
    {
        $user = User::factory()->create();
        $data = EducationalBackground::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.educational-backgrounds.store', $user),
            $data
        );

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $educationalBackground = EducationalBackground::latest('id')->first();

        $this->assertEquals($user->id, $educationalBackground->user_id);
    }
}
