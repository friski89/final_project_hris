<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Requests\ReligionStoreRequest;
use App\Http\Requests\ReligionUpdateRequest;

class ReligionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Religion::class);

        $search = $request->get('search', '');

        $religions = Religion::search($search)
            ->latest()
            ->paginate(5);

        return view('app.religions.index', compact('religions', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Religion::class);

        return view('app.religions.create');
    }

    /**
     * @param \App\Http\Requests\ReligionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReligionStoreRequest $request)
    {
        $this->authorize('create', Religion::class);

        $validated = $request->validated();

        $religion = Religion::create($validated);

        return redirect()
            ->route('religions.edit', $religion)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Religion $religion)
    {
        $this->authorize('view', $religion);

        return view('app.religions.show', compact('religion'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Religion $religion)
    {
        $this->authorize('update', $religion);

        return view('app.religions.edit', compact('religion'));
    }

    /**
     * @param \App\Http\Requests\ReligionUpdateRequest $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function update(ReligionUpdateRequest $request, Religion $religion)
    {
        $this->authorize('update', $religion);

        $validated = $request->validated();

        $religion->update($validated);

        return redirect()
            ->route('religions.edit', $religion)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Religion $religion)
    {
        $this->authorize('delete', $religion);

        $religion->delete();

        return redirect()
            ->route('religions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
