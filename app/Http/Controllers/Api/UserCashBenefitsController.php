<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashBenefitResource;
use App\Http\Resources\CashBenefitCollection;

class UserCashBenefitsController extends Controller
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

        $cashBenefits = $user
            ->cashBenefits()
            ->search($search)
            ->latest()
            ->paginate();

        return new CashBenefitCollection($cashBenefits);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', CashBenefit::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'jenis_benefit' => ['required', 'max:255', 'string'],
            'nilai_benefit' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
        ]);

        $cashBenefit = $user->cashBenefits()->create($validated);

        return new CashBenefitResource($cashBenefit);
    }
}
