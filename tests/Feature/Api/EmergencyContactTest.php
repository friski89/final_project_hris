<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EmergencyContact;

use App\Models\Profile;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmergencyContactTest extends TestCase
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
    public function it_gets_emergency_contacts_list()
    {
        $emergencyContacts = EmergencyContact::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.emergency-contacts.index'));

        $response->assertOk()->assertSee($emergencyContacts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_emergency_contact()
    {
        $data = EmergencyContact::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.emergency-contacts.store'),
            $data
        );

        $this->assertDatabaseHas('emergency_contacts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_emergency_contact()
    {
        $emergencyContact = EmergencyContact::factory()->create();

        $profile = Profile::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'contact' => $this->faker->text(255),
            'relation' => $this->faker->text(255),
            'profile_id' => $profile->id,
        ];

        $response = $this->putJson(
            route('api.emergency-contacts.update', $emergencyContact),
            $data
        );

        $data['id'] = $emergencyContact->id;

        $this->assertDatabaseHas('emergency_contacts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_emergency_contact()
    {
        $emergencyContact = EmergencyContact::factory()->create();

        $response = $this->deleteJson(
            route('api.emergency-contacts.destroy', $emergencyContact)
        );

        $this->assertSoftDeleted($emergencyContact);

        $response->assertNoContent();
    }
}
