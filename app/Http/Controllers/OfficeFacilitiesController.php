<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OfficeFacilities;
use App\Http\Requests\OfficeFacilitiesStoreRequest;
use App\Http\Requests\OfficeFacilitiesUpdateRequest;

class OfficeFacilitiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OfficeFacilities::class);

        $search = $request->get('search', '');

        $allOfficeFacilities = OfficeFacilities::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_office_facilities.index',
            compact('allOfficeFacilities', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', OfficeFacilities::class);

        $users = User::pluck('name', 'id');

        return view('app.all_office_facilities.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\OfficeFacilitiesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeFacilitiesStoreRequest $request)
    {
        $this->authorize('create', OfficeFacilities::class);

        $validated = $request->validated();

        $officeFacilities = OfficeFacilities::create($validated);

        return redirect()
            ->route('all-office-facilities.edit', $officeFacilities)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OfficeFacilities $officeFacilities)
    {
        $this->authorize('view', $officeFacilities);

        return view(
            'app.all_office_facilities.show',
            compact('officeFacilities')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OfficeFacilities $officeFacilities)
    {
        $this->authorize('update', $officeFacilities);

        $users = User::pluck('name', 'id');

        return view(
            'app.all_office_facilities.edit',
            compact('officeFacilities', 'users')
        );
    }

    /**
     * @param \App\Http\Requests\OfficeFacilitiesUpdateRequest $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function update(
        OfficeFacilitiesUpdateRequest $request,
        OfficeFacilities $officeFacilities
    ) {
        $this->authorize('update', $officeFacilities);

        $validated = $request->validated();

        $officeFacilities->update($validated);

        return redirect()
            ->route('all-office-facilities.edit', $officeFacilities)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfficeFacilities $officeFacilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        OfficeFacilities $officeFacilities
    ) {
        $this->authorize('delete', $officeFacilities);

        $officeFacilities->delete();

        return redirect()
            ->route('all-office-facilities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
