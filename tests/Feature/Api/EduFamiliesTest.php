<?php

namespace Tests\Feature\Api;

use App\Models\Edu;
use App\Models\User;
use App\Models\Family;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EduFamiliesTest extends TestCase
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
    public function it_gets_edu_families()
    {
        $edu = Edu::factory()->create();
        $families = Family::factory()
            ->count(2)
            ->create([
                'edu_id' => $edu->id,
            ]);

        $response = $this->getJson(route('api.edus.families.index', $edu));

        $response->assertOk()->assertSee($families[0]->employee_name);
    }

    /**
     * @test
     */
    public function it_stores_the_edu_families()
    {
        $edu = Edu::factory()->create();
        $data = Family::factory()
            ->make([
                'edu_id' => $edu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.edus.families.store', $edu),
            $data
        );

        $this->assertDatabaseHas('families', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $family = Family::latest('id')->first();

        $this->assertEquals($edu->id, $family->edu_id);
    }
}
