<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetenceCoreValue;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetenceCoreValueTest extends TestCase
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
    public function it_gets_competence_core_values_list()
    {
        $competenceCoreValues = CompetenceCoreValue::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competence-core-values.index'));

        $response->assertOk()->assertSee($competenceCoreValues[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_competence_core_value()
    {
        $data = CompetenceCoreValue::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.competence-core-values.store'),
            $data
        );

        $this->assertDatabaseHas('competence_core_values', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->putJson(
            route('api.competence-core-values.update', $competenceCoreValue),
            $data
        );

        $data['id'] = $competenceCoreValue->id;

        $this->assertDatabaseHas('competence_core_values', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competence_core_value()
    {
        $competenceCoreValue = CompetenceCoreValue::factory()->create();

        $response = $this->deleteJson(
            route('api.competence-core-values.destroy', $competenceCoreValue)
        );

        $this->assertSoftDeleted($competenceCoreValue);

        $response->assertNoContent();
    }
}
