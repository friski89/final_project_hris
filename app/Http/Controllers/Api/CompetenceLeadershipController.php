<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetenceLeadership;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenceLeadershipResource;
use App\Http\Resources\CompetenceLeadershipCollection;
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
            ->paginate();

        return new CompetenceLeadershipCollection($competenceLeaderships);
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

        return new CompetenceLeadershipResource($competenceLeadership);
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

        return new CompetenceLeadershipResource($competenceLeadership);
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

        return new CompetenceLeadershipResource($competenceLeadership);
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

        return response()->noContent();
    }
}
