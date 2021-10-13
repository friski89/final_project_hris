<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Requests\VillageStoreRequest;
use App\Http\Requests\VillageUpdateRequest;

class VillageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Village::class);

        $search = $request->get('search', '');

        $villages = Village::search($search)
            ->latest()
            ->paginate(5);

        return view('app.villages.index', compact('villages', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Village::class);

        $districts = District::pluck('name', 'id');

        return view('app.villages.create', compact('districts'));
    }

    /**
     * @param \App\Http\Requests\VillageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillageStoreRequest $request)
    {
        $this->authorize('create', Village::class);

        $validated = $request->validated();

        $village = Village::create($validated);

        return redirect()
            ->route('villages.edit', $village)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Village $village)
    {
        $this->authorize('view', $village);

        return view('app.villages.show', compact('village'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Village $village)
    {
        $this->authorize('update', $village);

        $districts = District::pluck('name', 'id');

        return view('app.villages.edit', compact('village', 'districts'));
    }

    /**
     * @param \App\Http\Requests\VillageUpdateRequest $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function update(VillageUpdateRequest $request, Village $village)
    {
        $this->authorize('update', $village);

        $validated = $request->validated();

        $village->update($validated);

        return redirect()
            ->route('villages.edit', $village)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Village $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Village $village)
    {
        $this->authorize('delete', $village);

        $village->delete();

        return redirect()
            ->route('villages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
