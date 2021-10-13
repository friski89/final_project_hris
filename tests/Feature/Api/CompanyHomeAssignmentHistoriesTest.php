<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompanyHome;
use App\Models\AssignmentHistory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyHomeAssignmentHistoriesTest extends TestCase
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
    public function it_gets_company_home_assignment_histories()
    {
        $companyHome = CompanyHome::factory()->create();
        $assignmentHistories = AssignmentHistory::factory()
            ->count(2)
            ->create([
                'company_home_id' => $companyHome->id,
            ]);

        $response = $this->getJson(
            route('api.company-homes.assignment-histories.index', $companyHome)
        );

        $response->assertOk()->assertSee($assignmentHistories[0]->emp_no);
    }

    /**
     * @test
     */
    public function it_stores_the_company_home_assignment_histories()
    {
        $companyHome = CompanyHome::factory()->create();
        $data = AssignmentHistory::factory()
            ->make([
                'company_home_id' => $companyHome->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.company-homes.assignment-histories.store', $companyHome),
            $data
        );

        $this->assertDatabaseHas('assignment_histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $assignmentHistory = AssignmentHistory::latest('id')->first();

        $this->assertEquals(
            $companyHome->id,
            $assignmentHistory->company_home_id
        );
    }
}
