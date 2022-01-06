<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceHistoryResource;
use App\Http\Resources\ServiceHistoryCollection;

class CompanyHomeServiceHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('view', $companyHome);

        $search = $request->get('search', '');

        $serviceHistories = $companyHome
            ->serviceHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ServiceHistoryCollection($serviceHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'emoloyee_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'type' => ['required', 'max:255', 'string'],
            'company_host_id' => ['required', 'exists:company_hosts,id'],
            'band_position_id' => ['required', 'exists:band_positions,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $serviceHistory = $companyHome->serviceHistories()->create($validated);

        return new ServiceHistoryResource($serviceHistory);
    }
}
