<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetenceLeadership;
use App\Http\Requests\CompetenceLeadershipStoreRequest;
use App\Http\Requests\CompetenceLeadershipUpdateRequest;

class CompetenceLeadershipController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompetenceLeadership::class);

        $search = $request->get('search', '');

        $competenceLeaderships = CompetenceLeadership::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.competence_leaderships.index',
            compact('competenceLeaderships', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CompetenceLeadership::class);

        return view('app.competence_leaderships.create');
    }

    /**
     * @param \App\Http\Requests\CompetenceLeadershipStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceLeadershipStoreRequest $request)
    {
        $this->authorize('create', CompetenceLeadership::class);

        $validated = $request->validated();

        $competenceLeadership = CompetenceLeadership::create($validated);

        return redirect()
            ->route('competence-leaderships.edit', $competenceLeadership)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        CompetenceLeadership $competenceLeadership
    ) {
        $this->authorize('view', $competenceLeadership);

        return view(
            'app.competence_leaderships.show',
            compact('competenceLeadership')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        CompetenceLeadership $competenceLeadership
    ) {
        $this->authorize('update', $competenceLeadership);

        return view(
            'app.competence_leaderships.edit',
            compact('competenceLeadership')
        );
    }

    /**
     * @param \App\Http\Requests\CompetenceLeadershipUpdateRequest $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompetenceLeadershipUpdateRequest $request,
        CompetenceLeadership $competenceLeadership
    ) {
        $this->authorize('update', $competenceLeadership);

        $validated = $request->validated();

        $competenceLeadership->update($validated);

        return redirect()
            ->route('competence-leaderships.edit', $competenceLeadership)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompetenceLeadership $competenceLeadership
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CompetenceLeadership $competenceLeadership
    ) {
        $this->authorize('delete', $competenceLeadership);

        $competenceLeadership->delete();

        return redirect()
            ->route('competence-leaderships.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
