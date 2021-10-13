<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceHistoryResource;
use App\Http\Resources\ServiceHistoryCollection;

class UserServiceHistoriesController extends Controller
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

        $serviceHistories = $user
            ->serviceHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ServiceHistoryCollection($serviceHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'emoloyee_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date'],
            'type' => ['required', 'max:255', 'string'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'company_host_id' => ['required', 'exists:company_hosts,id'],
            'band_position_id' => ['required', 'exists:band_positions,id'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
        ]);

        $serviceHistory = $user->serviceHistories()->create($validated);

        return new ServiceHistoryResource($serviceHistory);
    }
}
