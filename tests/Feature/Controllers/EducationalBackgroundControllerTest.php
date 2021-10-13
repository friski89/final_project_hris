<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EducationalBackground;

use App\Models\Edu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationalBackgroundControllerTest extends TestCase
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
    public function it_displays_index_view_with_educational_backgrounds()
    {
        $educationalBackgrounds = EducationalBackground::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('educational-backgrounds.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.educational_backgrounds.index')
            ->assertViewHas('educationalBackgrounds');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_educational_background()
    {
        $response = $this->get(route('educational-backgrounds.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.educational_backgrounds.create');
    }

    /**
     * @test
     */
    public function it_stores_the_educational_background()
    {
        $data = EducationalBackground::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('educational-backgrounds.store'), $data);

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $educationalBackground = EducationalBackground::latest('id')->first();

        $response->assertRedirect(
            route('educational-backgrounds.edit', $educationalBackground)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_educational_background()
    {
        $educationalBackground = EducationalBackground::factory()->create();

        $response = $this->get(
            route('educational-backgrounds.show', $educationalBackground)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.educational_backgrounds.show')
            ->assertViewHas('educationalBackground');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_educational_background()
    {
        $educationalBackground = EducationalBackground::factory()->create();

        $response = $this->get(
            route('educational-backgrounds.edit', $educationalBackground)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.educational_backgrounds.edit')
            ->assertViewHas('educationalBackground');
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

        $response = $this->put(
            route('educational-backgrounds.update', $educationalBackground),
            $data
        );

        $data['id'] = $educationalBackground->id;

        $this->assertDatabaseHas('educational_backgrounds', $data);

        $response->assertRedirect(
            route('educational-backgrounds.edit', $educationalBackground)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_educational_background()
    {
        $educationalBackground = EducationalBackground::factory()->create();

        $response = $this->delete(
            route('educational-backgrounds.destroy', $educationalBackground)
        );

        $response->assertRedirect(route('educational-backgrounds.index'));

        $this->assertSoftDeleted($educationalBackground);
    }
}
