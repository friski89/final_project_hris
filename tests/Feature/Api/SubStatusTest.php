<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SubStatus;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubStatusTest extends TestCase
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
    public function it_gets_sub_statuses_list()
    {
        $subStatuses = SubStatus::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.sub-statuses.index'));

        $response->assertOk()->assertSee($subStatuses[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_sub_status()
    {
        $data = SubStatus::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.sub-statuses.store'), $data);

        $this->assertDatabaseHas('sub_statuses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.sub-statuses.update', $subStatus),
            $data
        );

        $data['id'] = $subStatus->id;

        $this->assertDatabaseHas('sub_statuses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sub_status()
    {
        $subStatus = SubStatus::factory()->create();

        $response = $this->deleteJson(
            route('api.sub-statuses.destroy', $subStatus)
        );

        $this->assertSoftDeleted($subStatus);

        $response->assertNoContent();
    }
}
