<?php

namespace App\Http\Controllers\Api;

use App\Models\BandPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceHistoryResource;
use App\Http\Resources\ServiceHistoryCollection;

class BandPositionServiceHistoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('view', $bandPosition);

        $search = $request->get('search', '');

        $serviceHistories = $bandPosition
            ->serviceHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ServiceHistoryCollection($serviceHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BandPosition $bandPosition
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BandPosition $bandPosition)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'emoloyee_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'type' => ['required', 'max:255', 'string'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'company_host_id' => ['required', 'exists:company_hosts,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $serviceHistory = $bandPosition->serviceHistories()->create($validated);

        return new ServiceHistoryResource($serviceHistory);
    }
}
