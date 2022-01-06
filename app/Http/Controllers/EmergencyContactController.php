<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Http\Requests\EmergencyContactStoreRequest;
use App\Http\Requests\EmergencyContactUpdateRequest;

class EmergencyContactController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EmergencyContact::class);

        $search = $request->get('search', '');

        $emergencyContacts = EmergencyContact::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.emergency_contacts.index',
            compact('emergencyContacts', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EmergencyContact::class);

        $profiles = Profile::pluck('phone_number', 'id');

        return view('app.emergency_contacts.create', compact('profiles'));
    }

    /**
     * @param \App\Http\Requests\EmergencyContactStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmergencyContactStoreRequest $request)
    {
        $this->authorize('create', EmergencyContact::class);

        $validated = $request->validated();

        $emergencyContact = EmergencyContact::create($validated);

        return redirect()
            ->route('emergency-contacts.edit', $emergencyContact)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmergencyContact $emergencyContact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EmergencyContact $emergencyContact)
    {
        $this->authorize('view', $emergencyContact);

        return view('app.emergency_contacts.show', compact('emergencyContact'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmergencyContact $emergencyContact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EmergencyContact $emergencyContact)
    {
        $this->authorize('update', $emergencyContact);

        $profiles = Profile::pluck('phone_number', 'id');

        return view(
            'app.emergency_contacts.edit',
            compact('emergencyContact', 'profiles')
        );
    }

    /**
     * @param \App\Http\Requests\EmergencyContactUpdateRequest $request
     * @param \App\Models\EmergencyContact $emergencyContact
     * @return \Illuminate\Http\Response
     */
    public function update(
        EmergencyContactUpdateRequest $request,
        EmergencyContact $emergencyContact
    ) {
        $this->authorize('update', $emergencyContact);

        $validated = $request->validated();

        $emergencyContact->update($validated);

        return redirect()
            ->route('emergency-contacts.edit', $emergencyContact)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmergencyContact $emergencyContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EmergencyContact $emergencyContact
    ) {
        $this->authorize('delete', $emergencyContact);

        $emergencyContact->delete();

        return redirect()
            ->route('emergency-contacts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
