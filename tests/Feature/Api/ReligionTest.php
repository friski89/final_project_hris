<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Religion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReligionTest extends TestCase
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
    public function it_gets_religions_list()
    {
        $religions = Religion::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.religions.index'));

        $response->assertOk()->assertSee($religions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_religion()
    {
        $data = Religion::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.religions.store'), $data);

        $this->assertDatabaseHas('religions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.religions.update', $religion),
            $data
        );

        $data['id'] = $religion->id;

        $this->assertDatabaseHas('religions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_religion()
    {
        $religion = Religion::factory()->create();

        $response = $this->deleteJson(
            route('api.religions.destroy', $religion)
        );

        $this->assertSoftDeleted($religion);

        $response->assertNoContent();
    }
}
