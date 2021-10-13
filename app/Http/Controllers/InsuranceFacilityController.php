<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InsuranceFacility;
use App\Http\Requests\InsuranceFacilityStoreRequest;
use App\Http\Requests\InsuranceFacilityUpdateRequest;

class InsuranceFacilityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InsuranceFacility::class);

        $search = $request->get('search', '');

        $insuranceFacilities = InsuranceFacility::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.insurance_facilities.index',
            compact('insuranceFacilities', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', InsuranceFacility::class);

        $users = User::pluck('name', 'id');

        return view('app.insurance_facilities.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\InsuranceFacilityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceFacilityStoreRequest $request)
    {
        $this->authorize('create', InsuranceFacility::class);

        $validated = $request->validated();

        $insuranceFacility = InsuranceFacility::create($validated);

        return redirect()
            ->route('insurance-facilities.edit', $insuranceFacility)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InsuranceFacility $insuranceFacility)
    {
        $this->authorize('view', $insuranceFacility);

        return view(
            'app.insurance_facilities.show',
            compact('insuranceFacility')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InsuranceFacility $insuranceFacility)
    {
        $this->authorize('update', $insuranceFacility);

        $users = User::pluck('name', 'id');

        return view(
            'app.insurance_facilities.edit',
            compact('insuranceFacility', 'users')
        );
    }

    /**
     * @param \App\Http\Requests\InsuranceFacilityUpdateRequest $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function update(
        InsuranceFacilityUpdateRequest $request,
        InsuranceFacility $insuranceFacility
    ) {
        $this->authorize('update', $insuranceFacility);

        $validated = $request->validated();

        $insuranceFacility->update($validated);

        return redirect()
            ->route('insurance-facilities.edit', $insuranceFacility)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceFacility $insuranceFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        InsuranceFacility $insuranceFacility
    ) {
        $this->authorize('delete', $insuranceFacility);

        $insuranceFacility->delete();

        return redirect()
            ->route('insurance-facilities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
