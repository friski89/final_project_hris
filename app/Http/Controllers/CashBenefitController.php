<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CashBenefit;
use Illuminate\Http\Request;
use App\Http\Requests\CashBenefitStoreRequest;
use App\Http\Requests\CashBenefitUpdateRequest;

class CashBenefitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CashBenefit::class);

        $search = $request->get('search', '');

        $cashBenefits = CashBenefit::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.cash_benefits.index',
            compact('cashBenefits', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CashBenefit::class);

        $users = User::pluck('name', 'id');

        return view('app.cash_benefits.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\CashBenefitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashBenefitStoreRequest $request)
    {
        $this->authorize('create', CashBenefit::class);

        $validated = $request->validated();

        $cashBenefit = CashBenefit::create($validated);

        return redirect()
            ->route('cash-benefits.edit', $cashBenefit)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CashBenefit $cashBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CashBenefit $cashBenefit)
    {
        $this->authorize('view', $cashBenefit);

        return view('app.cash_benefits.show', compact('cashBenefit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CashBenefit $cashBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CashBenefit $cashBenefit)
    {
        $this->authorize('update', $cashBenefit);

        $users = User::pluck('name', 'id');

        return view('app.cash_benefits.edit', compact('cashBenefit', 'users'));
    }

    /**
     * @param \App\Http\Requests\CashBenefitUpdateRequest $request
     * @param \App\Models\CashBenefit $cashBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(
        CashBenefitUpdateRequest $request,
        CashBenefit $cashBenefit
    ) {
        $this->authorize('update', $cashBenefit);

        $validated = $request->validated();

        $cashBenefit->update($validated);

        return redirect()
            ->route('cash-benefits.edit', $cashBenefit)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CashBenefit $cashBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CashBenefit $cashBenefit)
    {
        $this->authorize('delete', $cashBenefit);

        $cashBenefit->delete();

        return redirect()
            ->route('cash-benefits.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
