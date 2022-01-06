<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OfficeFacilities;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAllOfficeFacilitiesTest extends TestCase
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
    public function it_gets_user_all_office_facilities()
    {
        $user = User::factory()->create();
        $allOfficeFacilities = OfficeFacilities::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.all-office-facilities.index', $user)
        );

        $response->assertOk()->assertSee($allOfficeFacilities[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_all_office_facilities()
    {
        $user = User::factory()->create();
        $data = OfficeFacilities::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.all-office-facilities.store', $user),
            $data
        );

        $this->assertDatabaseHas('office_facilities', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $officeFacilities = OfficeFacilities::latest('id')->first();

        $this->assertEquals($user->id, $officeFacilities->user_id);
    }
}
