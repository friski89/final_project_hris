<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regencie;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;

class DistrictController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', District::class);

        $search = $request->get('search', '');

        $districts = District::search($search)
            ->latest()
            ->paginate(5);

        return view('app.districts.index', compact('districts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', District::class);

        $regencies = Regencie::pluck('name', 'id');

        return view('app.districts.create', compact('regencies'));
    }

    /**
     * @param \App\Http\Requests\DistrictStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictStoreRequest $request)
    {
        $this->authorize('create', District::class);

        $validated = $request->validated();

        $district = District::create($validated);

        return redirect()
            ->route('districts.edit', $district)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, District $district)
    {
        $this->authorize('view', $district);

        return view('app.districts.show', compact('district'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, District $district)
    {
        $this->authorize('update', $district);

        $regencies = Regencie::pluck('name', 'id');

        return view('app.districts.edit', compact('district', 'regencies'));
    }

    /**
     * @param \App\Http\Requests\DistrictUpdateRequest $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictUpdateRequest $request, District $district)
    {
        $this->authorize('update', $district);

        $validated = $request->validated();

        $district->update($validated);

        return redirect()
            ->route('districts.edit', $district)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\District $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, District $district)
    {
        $this->authorize('delete', $district);

        $district->delete();

        return redirect()
            ->route('districts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
