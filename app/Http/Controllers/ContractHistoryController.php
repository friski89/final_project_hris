<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContractHistory;
use App\Http\Requests\ContractHistoryStoreRequest;
use App\Http\Requests\ContractHistoryUpdateRequest;

class ContractHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ContractHistory::class);

        $search = $request->get('search', '');

        $contractHistories = ContractHistory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.contract_histories.index',
            compact('contractHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ContractHistory::class);

        $users = User::pluck('name', 'id');

        return view('app.contract_histories.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\ContractHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractHistoryStoreRequest $request)
    {
        $this->authorize('create', ContractHistory::class);

        $validated = $request->validated();

        $contractHistory = ContractHistory::create($validated);

        return redirect()
            ->route('contract-histories.edit', $contractHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContractHistory $contractHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ContractHistory $contractHistory)
    {
        $this->authorize('view', $contractHistory);

        return view('app.contract_histories.show', compact('contractHistory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContractHistory $contractHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ContractHistory $contractHistory)
    {
        $this->authorize('update', $contractHistory);

        $users = User::pluck('name', 'id');

        return view(
            'app.contract_histories.edit',
            compact('contractHistory', 'users')
        );
    }

    /**
     * @param \App\Http\Requests\ContractHistoryUpdateRequest $request
     * @param \App\Models\ContractHistory $contractHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ContractHistoryUpdateRequest $request,
        ContractHistory $contractHistory
    ) {
        $this->authorize('update', $contractHistory);

        $validated = $request->validated();

        $contractHistory->update($validated);

        return redirect()
            ->route('contract-histories.edit', $contractHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContractHistory $contractHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ContractHistory $contractHistory)
    {
        $this->authorize('delete', $contractHistory);

        $contractHistory->delete();

        return redirect()
            ->route('contract-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
