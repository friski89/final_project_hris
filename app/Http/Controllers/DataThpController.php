<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataThp;
use Illuminate\Http\Request;
use App\Http\Requests\DataThpStoreRequest;
use App\Http\Requests\DataThpUpdateRequest;

class DataThpController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DataThp::class);

        $search = $request->get('search', '');

        $dataThps = DataThp::search($search)
            ->latest()
            ->paginate(5);

        return view('app.data_thps.index', compact('dataThps', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DataThp::class);

        $users = User::pluck('name', 'id');

        return view('app.data_thps.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\DataThpStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataThpStoreRequest $request)
    {
        $this->authorize('create', DataThp::class);

        $validated = $request->validated();

        $dataThp = DataThp::create($validated);

        return redirect()
            ->route('data-thps.edit', $dataThp)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataThp $dataThp)
    {
        $this->authorize('view', $dataThp);

        return view('app.data_thps.show', compact('dataThp'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataThp $dataThp)
    {
        $this->authorize('update', $dataThp);

        $users = User::pluck('name', 'id');

        return view('app.data_thps.edit', compact('dataThp', 'users'));
    }

    /**
     * @param \App\Http\Requests\DataThpUpdateRequest $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function update(DataThpUpdateRequest $request, DataThp $dataThp)
    {
        $this->authorize('update', $dataThp);

        $validated = $request->validated();

        $dataThp->update($validated);

        return redirect()
            ->route('data-thps.edit', $dataThp)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataThp $dataThp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DataThp $dataThp)
    {
        $this->authorize('delete', $dataThp);

        $dataThp->delete();

        return redirect()
            ->route('data-thps.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
