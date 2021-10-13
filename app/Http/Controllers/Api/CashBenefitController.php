<?php

namespace App\Http\Controllers\Api;

use App\Models\CashBenefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashBenefitResource;
use App\Http\Resources\CashBenefitCollection;
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
            ->paginate();

        return new CashBenefitCollection($cashBenefits);
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

        return new CashBenefitResource($cashBenefit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CashBenefit $cashBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CashBenefit $cashBenefit)
    {
        $this->authorize('view', $cashBenefit);

        return new CashBenefitResource($cashBenefit);
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

        return new CashBenefitResource($cashBenefit);
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

        return response()->noContent();
    }
}
