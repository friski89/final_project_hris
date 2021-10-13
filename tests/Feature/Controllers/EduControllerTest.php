<?php

namespace Tests\Feature\Controllers;

use App\Models\Edu;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EduControllerTest extends TestCase
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
    public function it_displays_index_view_with_edus()
    {
        $edus = Edu::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('edus.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.edus.index')
            ->assertViewHas('edus');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_edu()
    {
        $response = $this->get(route('edus.create'));

        $response->assertOk()->assertViewIs('app.edus.create');
    }

    /**
     * @test
     */
    public function it_stores_the_edu()
    {
        $data = Edu::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('edus.store'), $data);

        $this->assertDatabaseHas('edus', $data);

        $edu = Edu::latest('id')->first();

        $response->assertRedirect(route('edus.edit', $edu));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_edu()
    {
        $edu = Edu::factory()->create();

        $response = $this->get(route('edus.show', $edu));

        $response
            ->assertOk()
            ->assertViewIs('app.edus.show')
            ->assertViewHas('edu');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_edu()
    {
        $edu = Edu::factory()->create();

        $response = $this->get(route('edus.edit', $edu));

        $response
            ->assertOk()
            ->assertViewIs('app.edus.edit')
            ->assertViewHas('edu');
    }

    /**
     * @test
     */
    public function it_updates_the_edu()
    {
        $edu = Edu::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('edus.update', $edu), $data);

        $data['id'] = $edu->id;

        $this->assertDatabaseHas('edus', $data);

        $response->assertRedirect(route('edus.edit', $edu));
    }

    /**
     * @test
     */
    public function it_deletes_the_edu()
    {
        $edu = Edu::factory()->create();

        $response = $this->delete(route('edus.destroy', $edu));

        $response->assertRedirect(route('edus.index'));

        $this->assertSoftDeleted($edu);
    }
}
