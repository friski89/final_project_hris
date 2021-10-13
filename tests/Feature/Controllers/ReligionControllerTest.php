<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Religion;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReligionControllerTest extends TestCase
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
    public function it_displays_index_view_with_religions()
    {
        $religions = Religion::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('religions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.religions.index')
            ->assertViewHas('religions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_religion()
    {
        $response = $this->get(route('religions.create'));

        $response->assertOk()->assertViewIs('app.religions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_religion()
    {
        $data = Religion::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('religions.store'), $data);

        $this->assertDatabaseHas('religions', $data);

        $religion = Religion::latest('id')->first();

        $response->assertRedirect(route('religions.edit', $religion));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_religion()
    {
        $religion = Religion::factory()->create();

        $response = $this->get(route('religions.show', $religion));

        $response
            ->assertOk()
            ->assertViewIs('app.religions.show')
            ->assertViewHas('religion');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_religion()
    {
        $religion = Religion::factory()->create();

        $response = $this->get(route('religions.edit', $religion));

        $response
            ->assertOk()
            ->assertViewIs('app.religions.edit')
            ->assertViewHas('religion');
    }

    /**
     * @test
     */
    public function it_updates_the_religion()
    {
        $religion = Religion::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('religions.update', $religion), $data);

        $data['id'] = $religion->id;

        $this->assertDatabaseHas('religions', $data);

        $response->assertRedirect(route('religions.edit', $religion));
    }

    /**
     * @test
     */
    public function it_deletes_the_religion()
    {
        $religion = Religion::factory()->create();

        $response = $this->delete(route('religions.destroy', $religion));

        $response->assertRedirect(route('religions.index'));

        $this->assertSoftDeleted($religion);
    }
}
