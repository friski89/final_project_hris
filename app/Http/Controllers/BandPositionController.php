<?php

namespace App\Http\Controllers;

use App\Models\BandPosition;
use Illuminate\Http\Request;
use App\Http\Requests\BandPositionStoreRequest;
use App\Http\Requests\BandPositionUpdateRequest;

class BandPositionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BandPosition::class);

        $search = $request->get('search', '');

        $bandPositions = BandPosition::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.band_positions.index',
            compact('bandPositions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BandPosition::class);

        return view('app.band_positions.create');
    }

    /**
     * @param \App\Http\Requests\BandPositionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BandPositionStoreRequest $request)
    {
        $this->authorize('create', BandPosition::class);

        $validated = $request->validated();

        $bandPosition = BandPosition::create($validated);

        return redirect()
            ->route('band-positions.edit', $bandPosition)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('view', $bandPosition);

        return view('app.band_positions.show', compact('bandPosition'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('update', $bandPosition);

        return view('app.band_positions.edit', compact('bandPosition'));
    }

    /**
     * @param \App\Http\Requests\BandPositionUpdateRequest $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function update(
        BandPositionUpdateRequest $request,
        BandPosition $bandPosition
    ) {
        $this->authorize('update', $bandPosition);

        $validated = $request->validated();

        $bandPosition->update($validated);

        return redirect()
            ->route('band-positions.edit', $bandPosition)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('delete', $bandPosition);

        $bandPosition->delete();

        return redirect()
            ->route('band-positions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
