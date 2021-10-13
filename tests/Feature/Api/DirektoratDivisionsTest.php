<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Division;
use App\Models\Direktorat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirektoratDivisionsTest extends TestCase
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
    public function it_gets_direktorat_divisions()
    {
        $direktorat = Direktorat::factory()->create();
        $divisions = Division::factory()
            ->count(2)
            ->create([
                'direktorat_id' => $direktorat->id,
            ]);

        $response = $this->getJson(
            route('api.direktorats.divisions.index', $direktorat)
        );

        $response->assertOk()->assertSee($divisions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_direktorat_divisions()
    {
        $direktorat = Direktorat::factory()->create();
        $data = Division::factory()
            ->make([
                'direktorat_id' => $direktorat->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.direktorats.divisions.store', $direktorat),
            $data
        );

        $this->assertDatabaseHas('divisions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $division = Division::latest('id')->first();

        $this->assertEquals($direktorat->id, $division->direktorat_id);
    }
}
