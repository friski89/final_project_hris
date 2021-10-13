<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ContractHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContractHistoryResource;
use App\Http\Resources\ContractHistoryCollection;
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
            ->paginate();

        return new ContractHistoryCollection($contractHistories);
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

        return new ContractHistoryResource($contractHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContractHistory $contractHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ContractHistory $contractHistory)
    {
        $this->authorize('view', $contractHistory);

        return new ContractHistoryResource($contractHistory);
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

        return new ContractHistoryResource($contractHistory);
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

        return response()->noContent();
    }
}
