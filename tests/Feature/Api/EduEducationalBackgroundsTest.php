<?php

namespace Tests\Feature\Api;

use App\Models\Edu;
use App\Models\User;
use App\Models\EducationalBackground;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EduEducationalBackgroundsTest extends TestCase
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
    public function it_gets_edu_educational_backgrounds()
    {
        $edu = Edu::factory()->create();
        $educationalBackgrounds = EducationalBackground::factory()
            ->count(2)
            ->create([
                'edu_id' => $edu->id,
            ]);

        $response = $this->getJson(
            route('api.edus.educational-backgrounds.index', $edu)
        );

        $response->assertOk()->assertSee($educationalBackgrounds[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_edu_educational_backgrounds()
    {
        $edu = Edu::factory()->create();
        $data = EducationalBackground::factory()
            ->make([
                'edu_id' => $edu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.edus.educational-backgrounds.store', $edu),
            $data
        );

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $educationalBackground = EducationalBackground::latest('id')->first();

        $this->assertEquals($edu->id, $educationalBackground->edu_id);
    }
}
