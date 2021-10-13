<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\ProvinceStoreRequest;
use App\Http\Requests\ProvinceUpdateRequest;

class ProvinceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Province::class);

        $search = $request->get('search', '');

        $provinces = Province::search($search)
            ->latest()
            ->paginate(5);

        return view('app.provinces.index', compact('provinces', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Province::class);

        return view('app.provinces.create');
    }

    /**
     * @param \App\Http\Requests\ProvinceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceStoreRequest $request)
    {
        $this->authorize('create', Province::class);

        $validated = $request->validated();

        $province = Province::create($validated);

        return redirect()
            ->route('provinces.edit', $province)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Province $province)
    {
        $this->authorize('view', $province);

        return view('app.provinces.show', compact('province'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Province $province)
    {
        $this->authorize('update', $province);

        return view('app.provinces.edit', compact('province'));
    }

    /**
     * @param \App\Http\Requests\ProvinceUpdateRequest $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceUpdateRequest $request, Province $province)
    {
        $this->authorize('update', $province);

        $validated = $request->validated();

        $province->update($validated);

        return redirect()
            ->route('provinces.edit', $province)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Province $province)
    {
        $this->authorize('delete', $province);

        $province->delete();

        return redirect()
            ->route('provinces.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
