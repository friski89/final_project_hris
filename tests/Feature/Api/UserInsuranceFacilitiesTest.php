<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\InsuranceFacility;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserInsuranceFacilitiesTest extends TestCase
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
    public function it_gets_user_insurance_facilities()
    {
        $user = User::factory()->create();
        $insuranceFacilities = InsuranceFacility::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.insurance-facilities.index', $user)
        );

        $response->assertOk()->assertSee($insuranceFacilities[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_user_insurance_facilities()
    {
        $user = User::factory()->create();
        $data = InsuranceFacility::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.insurance-facilities.store', $user),
            $data
        );

        $this->assertDatabaseHas('insurance_facilities', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $insuranceFacility = InsuranceFacility::latest('id')->first();

        $this->assertEquals($user->id, $insuranceFacility->user_id);
    }
}
