<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyHost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceHistoryResource;
use App\Http\Resources\ServiceHistoryCollection;

class CompanyHostServiceHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('view', $companyHost);

        $search = $request->get('search', '');

        $serviceHistories = $companyHost
            ->serviceHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ServiceHistoryCollection($serviceHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'emoloyee_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'type' => ['required', 'max:255', 'string'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'band_position_id' => ['required', 'exists:band_positions,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $serviceHistory = $companyHost->serviceHistories()->create($validated);

        return new ServiceHistoryResource($serviceHistory);
    }
}
