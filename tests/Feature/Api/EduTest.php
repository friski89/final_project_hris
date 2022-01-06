<?php

namespace Tests\Feature\Api;

use App\Models\Edu;
use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EduTest extends TestCase
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
    public function it_gets_edus_list()
    {
        $edus = Edu::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.edus.index'));

        $response->assertOk()->assertSee($edus[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_edu()
    {
        $data = Edu::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.edus.store'), $data);

        $this->assertDatabaseHas('edus', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.edus.update', $edu), $data);

        $data['id'] = $edu->id;

        $this->assertDatabaseHas('edus', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_edu()
    {
        $edu = Edu::factory()->create();

        $response = $this->deleteJson(route('api.edus.destroy', $edu));

        $this->assertSoftDeleted($edu);

        $response->assertNoContent();
    }
}
