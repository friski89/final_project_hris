<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmergencyContactResource;
use App\Http\Resources\EmergencyContactCollection;
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
            ->paginate();

        return new EmergencyContactCollection($emergencyContacts);
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

        return new EmergencyContactResource($emergencyContact);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmergencyContact $emergencyContact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EmergencyContact $emergencyContact)
    {
        $this->authorize('view', $emergencyContact);

        return new EmergencyContactResource($emergencyContact);
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

        return new EmergencyContactResource($emergencyContact);
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

        return response()->noContent();
    }
}
