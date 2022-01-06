<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Regencie;
use App\Models\District;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegencieDistrictsTest extends TestCase
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
    public function it_gets_regencie_districts()
    {
        $regencie = Regencie::factory()->create();
        $districts = District::factory()
            ->count(2)
            ->create([
                'regencie_id' => $regencie->id,
            ]);

        $response = $this->getJson(
            route('api.regencies.districts.index', $regencie)
        );

        $response->assertOk()->assertSee($districts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_regencie_districts()
    {
        $regencie = Regencie::factory()->create();
        $data = District::factory()
            ->make([
                'regencie_id' => $regencie->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.regencies.districts.store', $regencie),
            $data
        );

        $this->assertDatabaseHas('districts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $district = District::latest('id')->first();

        $this->assertEquals($regencie->id, $district->regencie_id);
    }
}
