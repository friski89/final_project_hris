<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherCompetencies;
use App\Http\Requests\OtherCompetenciesStoreRequest;
use App\Http\Requests\OtherCompetenciesUpdateRequest;

class OtherCompetenciesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OtherCompetencies::class);

        $search = $request->get('search', '');

        $allOtherCompetencies = OtherCompetencies::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_other_competencies.index',
            compact('allOtherCompetencies', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', OtherCompetencies::class);

        return view('app.all_other_competencies.create');
    }

    /**
     * @param \App\Http\Requests\OtherCompetenciesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtherCompetenciesStoreRequest $request)
    {
        $this->authorize('create', OtherCompetencies::class);

        $validated = $request->validated();

        $otherCompetencies = OtherCompetencies::create($validated);

        return redirect()
            ->route('all-other-competencies.edit', $otherCompetencies)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OtherCompetencies $otherCompetencies)
    {
        $this->authorize('view', $otherCompetencies);

        return view(
            'app.all_other_competencies.show',
            compact('otherCompetencies')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OtherCompetencies $otherCompetencies)
    {
        $this->authorize('update', $otherCompetencies);

        return view(
            'app.all_other_competencies.edit',
            compact('otherCompetencies')
        );
    }

    /**
     * @param \App\Http\Requests\OtherCompetenciesUpdateRequest $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function update(
        OtherCompetenciesUpdateRequest $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('update', $otherCompetencies);

        $validated = $request->validated();

        $otherCompetencies->update($validated);

        return redirect()
            ->route('all-other-competencies.edit', $otherCompetencies)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherCompetencies $otherCompetencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        OtherCompetencies $otherCompetencies
    ) {
        $this->authorize('delete', $otherCompetencies);

        $otherCompetencies->delete();

        return redirect()
            ->route('all-other-competencies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
