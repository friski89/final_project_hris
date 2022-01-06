<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContractHistoryResource;
use App\Http\Resources\ContractHistoryCollection;

class UserContractHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $contractHistories = $user
            ->contractHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContractHistoryCollection($contractHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', ContractHistory::class);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'max:255', 'string'],
        ]);

        $contractHistory = $user->contractHistories()->create($validated);

        return new ContractHistoryResource($contractHistory);
    }
}
