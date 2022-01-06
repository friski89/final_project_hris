<?php

namespace App\Http\Controllers;

use App\Models\CityRecuite;
use Illuminate\Http\Request;
use App\Http\Requests\CityRecuiteStoreRequest;
use App\Http\Requests\CityRecuiteUpdateRequest;

class CityRecuiteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CityRecuite::class);

        $search = $request->get('search', '');

        $cityRecuites = CityRecuite::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.city_recuites.index',
            compact('cityRecuites', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CityRecuite::class);

        return view('app.city_recuites.create');
    }

    /**
     * @param \App\Http\Requests\CityRecuiteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRecuiteStoreRequest $request)
    {
        $this->authorize('create', CityRecuite::class);

        $validated = $request->validated();

        $cityRecuite = CityRecuite::create($validated);

        return redirect()
            ->route('city-recuites.edit', $cityRecuite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityRecuite $cityRecuite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityRecuite $cityRecuite)
    {
        $this->authorize('view', $cityRecuite);

        return view('app.city_recuites.show', compact('cityRecuite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityRecuite $cityRecuite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CityRecuite $cityRecuite)
    {
        $this->authorize('update', $cityRecuite);

        return view('app.city_recuites.edit', compact('cityRecuite'));
    }

    /**
     * @param \App\Http\Requests\CityRecuiteUpdateRequest $request
     * @param \App\Models\CityRecuite $cityRecuite
     * @return \Illuminate\Http\Response
     */
    public function update(
        CityRecuiteUpdateRequest $request,
        CityRecuite $cityRecuite
    ) {
        $this->authorize('update', $cityRecuite);

        $validated = $request->validated();

        $cityRecuite->update($validated);

        return redirect()
            ->route('city-recuites.edit', $cityRecuite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityRecuite $cityRecuite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CityRecuite $cityRecuite)
    {
        $this->authorize('delete', $cityRecuite);

        $cityRecuite->delete();

        return redirect()
            ->route('city-recuites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
