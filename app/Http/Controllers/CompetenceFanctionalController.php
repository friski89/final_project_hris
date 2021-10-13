<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetenceFanctional;
use App\Http\Requests\CompetenceFanctionalStoreRequest;
use App\Http\Requests\CompetenceFanctionalUpdateRequest;

class CompetenceFanctionalController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompetenceFanctional::class);

        $search = $request->get('search', '');

        $competenceFanctionals = CompetenceFanctional::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.competence_fanctionals.index',
            compact('competenceFanctionals', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CompetenceFanctional::class);

        return view('app.competence_fanctionals.create');
    }

    /**
     * @param \App\Http\Requests\CompetenceFanctionalStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceFanctionalStoreRequest $request)
    {
        $this->authorize('create', CompetenceFanctional::class);

        $validated = $request->validated();

        $competenceFanctional = CompetenceFanctional::create($validated);

        return redirect()
            ->route('competence-fanctionals.edit', $competenceFanctional)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('view', $competenceFanctional);

        return view(
            'app.competence_fanctionals.show',
            compact('competenceFanctional')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('update', $competenceFanctional);

        return view(
            'app.competence_fanctionals.edit',
            compact('competenceFanctional')
        );
    }

    /**
     * @param \App\Http\Requests\CompetenceFanctionalUpdateRequest $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompetenceFanctionalUpdateRequest $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('update', $competenceFanctional);

        $validated = $request->validated();

        $competenceFanctional->update($validated);

        return redirect()
            ->route('competence-fanctionals.edit', $competenceFanctional)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceFanctional $competenceFanctional
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CompetenceFanctional $competenceFanctional
    ) {
        $this->authorize('delete', $competenceFanctional);

        $competenceFanctional->delete();

        return redirect()
            ->route('competence-fanctionals.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
