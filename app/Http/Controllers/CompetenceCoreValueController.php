<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetenceCoreValue;
use App\Http\Requests\CompetenceCoreValueStoreRequest;
use App\Http\Requests\CompetenceCoreValueUpdateRequest;

class CompetenceCoreValueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompetenceCoreValue::class);

        $search = $request->get('search', '');

        $competenceCoreValues = CompetenceCoreValue::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.competence_core_values.index',
            compact('competenceCoreValues', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CompetenceCoreValue::class);

        return view('app.competence_core_values.create');
    }

    /**
     * @param \App\Http\Requests\CompetenceCoreValueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceCoreValueStoreRequest $request)
    {
        $this->authorize('create', CompetenceCoreValue::class);

        $validated = $request->validated();

        $competenceCoreValue = CompetenceCoreValue::create($validated);

        return redirect()
            ->route('competence-core-values.edit', $competenceCoreValue)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('view', $competenceCoreValue);

        return view(
            'app.competence_core_values.show',
            compact('competenceCoreValue')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('update', $competenceCoreValue);

        return view(
            'app.competence_core_values.edit',
            compact('competenceCoreValue')
        );
    }

    /**
     * @param \App\Http\Requests\CompetenceCoreValueUpdateRequest $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompetenceCoreValueUpdateRequest $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('update', $competenceCoreValue);

        $validated = $request->validated();

        $competenceCoreValue->update($validated);

        return redirect()
            ->route('competence-core-values.edit', $competenceCoreValue)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceCoreValue $competenceCoreValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CompetenceCoreValue $competenceCoreValue
    ) {
        $this->authorize('delete', $competenceCoreValue);

        $competenceCoreValue->delete();

        return redirect()
            ->route('competence-core-values.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
