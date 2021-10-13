<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EducationalBackground;

use App\Models\Edu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationalBackgroundTest extends TestCase
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
    public function it_gets_educational_backgrounds_list()
    {
        $educationalBackgrounds = EducationalBackground::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.educational-backgrounds.index'));

        $response->assertOk()->assertSee($educationalBackgrounds[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_educational_background()
    {
        $data = EducationalBackground::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.educational-backgrounds.store'),
            $data
        );

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_educational_background()
    {
        $educationalBackground = EducationalBackground::factory()->create();

        $user = User::factory()->create();
        $edu = Edu::factory()->create();

        $data = [
            'emp_no' => $this->faker->text(100),
            'employee_name' => $this->faker->text(100),
            'institution_name' => $this->faker->text(255),
            'faculty' => $this->faker->text(255),
            'major' => $this->faker->text(255),
            'graduate_date' => $this->faker->date,
            'cost_category' => $this->faker->text(255),
            'scholarship_institution' => $this->faker->text(255),
            'gpa' => $this->faker->text(255),
            'gpa_scale' => $this->faker->text(255),
            'default' => $this->faker->text(255),
            'start_year' => $this->faker->date,
            'city' => $this->faker->text(255),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'user_id' => $user->id,
            'edu_id' => $edu->id,
        ];

        $response = $this->putJson(
            route('api.educational-backgrounds.update', $educationalBackground),
            $data
        );

        $data['id'] = $educationalBackground->id;

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_educational_background()
    {
        $educationalBackground = EducationalBackground::factory()->create();

        $response = $this->deleteJson(
            route('api.educational-backgrounds.destroy', $educationalBackground)
        );

        $this->assertSoftDeleted($educationalBackground);

        $response->assertNoContent();
    }
}
