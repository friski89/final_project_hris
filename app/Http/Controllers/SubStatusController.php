<?php

namespace App\Http\Controllers;

use App\Models\SubStatus;
use Illuminate\Http\Request;
use App\Http\Requests\SubStatusStoreRequest;
use App\Http\Requests\SubStatusUpdateRequest;

class SubStatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SubStatus::class);

        $search = $request->get('search', '');

        $subStatuses = SubStatus::search($search)
            ->latest()
            ->paginate(5);

        return view('app.sub_statuses.index', compact('subStatuses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SubStatus::class);

        return view('app.sub_statuses.create');
    }

    /**
     * @param \App\Http\Requests\SubStatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubStatusStoreRequest $request)
    {
        $this->authorize('create', SubStatus::class);

        $validated = $request->validated();

        $subStatus = SubStatus::create($validated);

        return redirect()
            ->route('sub-statuses.edit', $subStatus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SubStatus $subStatus)
    {
        $this->authorize('view', $subStatus);

        return view('app.sub_statuses.show', compact('subStatus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SubStatus $subStatus)
    {
        $this->authorize('update', $subStatus);

        return view('app.sub_statuses.edit', compact('subStatus'));
    }

    /**
     * @param \App\Http\Requests\SubStatusUpdateRequest $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function update(
        SubStatusUpdateRequest $request,
        SubStatus $subStatus
    ) {
        $this->authorize('update', $subStatus);

        $validated = $request->validated();

        $subStatus->update($validated);

        return redirect()
            ->route('sub-statuses.edit', $subStatus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubStatus $subStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SubStatus $subStatus)
    {
        $this->authorize('delete', $subStatus);

        $subStatus->delete();

        return redirect()
            ->route('sub-statuses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
