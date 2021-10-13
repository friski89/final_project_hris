<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Province;
use App\Models\Regencie;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProvinceRegenciesTest extends TestCase
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
    public function it_gets_province_regencies()
    {
        $province = Province::factory()->create();
        $regencies = Regencie::factory()
            ->count(2)
            ->create([
                'province_id' => $province->id,
            ]);

        $response = $this->getJson(
            route('api.provinces.regencies.index', $province)
        );

        $response->assertOk()->assertSee($regencies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_province_regencies()
    {
        $province = Province::factory()->create();
        $data = Regencie::factory()
            ->make([
                'province_id' => $province->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.provinces.regencies.store', $province),
            $data
        );

        $this->assertDatabaseHas('regencies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $regencie = Regencie::latest('id')->first();

        $this->assertEquals($province->id, $regencie->province_id);
    }
}
