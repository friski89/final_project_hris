<?php

namespace App\Http\Controllers\Api;

use App\Models\CityRecuite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityRecuiteResource;
use App\Http\Resources\CityRecuiteCollection;
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
            ->paginate();

        return new CityRecuiteCollection($cityRecuites);
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

        return new CityRecuiteResource($cityRecuite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityRecuite $cityRecuite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityRecuite $cityRecuite)
    {
        $this->authorize('view', $cityRecuite);

        return new CityRecuiteResource($cityRecuite);
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

        return new CityRecuiteResource($cityRecuite);
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

        return response()->noContent();
    }
}
