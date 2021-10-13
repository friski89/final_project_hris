<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EmergencyContact;

use App\Models\Profile;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmergencyContactControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_emergency_contacts()
    {
        $emergencyContacts = EmergencyContact::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('emergency-contacts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.emergency_contacts.index')
            ->assertViewHas('emergencyContacts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_emergency_contact()
    {
        $response = $this->get(route('emergency-contacts.create'));

        $response->assertOk()->assertViewIs('app.emergency_contacts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_emergency_contact()
    {
        $data = EmergencyContact::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('emergency-contacts.store'), $data);

        $this->assertDatabaseHas('emergency_contacts', $data);

        $emergencyContact = EmergencyContact::latest('id')->first();

        $response->assertRedirect(
            route('emergency-contacts.edit', $emergencyContact)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_emergency_contact()
    {
        $emergencyContact = EmergencyContact::factory()->create();

        $response = $this->get(
            route('emergency-contacts.show', $emergencyContact)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.emergency_contacts.show')
            ->assertViewHas('emergencyContact');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_emergency_contact()
    {
        $emergencyContact = EmergencyContact::factory()->create();

        $response = $this->get(
            route('emergency-contacts.edit', $emergencyContact)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.emergency_contacts.edit')
            ->assertViewHas('emergencyContact');
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

        $response = $this->put(
            route('emergency-contacts.update', $emergencyContact),
            $data
        );

        $data['id'] = $emergencyContact->id;

        $this->assertDatabaseHas('emergency_contacts', $data);

        $response->assertRedirect(
            route('emergency-contacts.edit', $emergencyContact)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_emergency_contact()
    {
        $emergencyContact = EmergencyContact::factory()->create();

        $response = $this->delete(
            route('emergency-contacts.destroy', $emergencyContact)
        );

        $response->assertRedirect(route('emergency-contacts.index'));

        $this->assertSoftDeleted($emergencyContact);
    }
}
