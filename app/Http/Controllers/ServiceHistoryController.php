<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use Illuminate\Http\Request;
use App\Models\BandPosition;
use App\Models\ServiceHistory;
use App\Http\Requests\ServiceHistoryStoreRequest;
use App\Http\Requests\ServiceHistoryUpdateRequest;

class ServiceHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ServiceHistory::class);

        $search = $request->get('search', '');

        $serviceHistories = ServiceHistory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.service_histories.index',
            compact('serviceHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ServiceHistory::class);

        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $bandPositions = BandPosition::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.service_histories.create',
            compact(
                'companyHomes',
                'companyHosts',
                'bandPositions',
                'jobTitles',
                'users'
            )
        );
    }

    /**
     * @param \App\Http\Requests\ServiceHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceHistoryStoreRequest $request)
    {
        $this->authorize('create', ServiceHistory::class);

        $validated = $request->validated();

        $serviceHistory = ServiceHistory::create($validated);

        return redirect()
            ->route('service-histories.edit', $serviceHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ServiceHistory $serviceHistory)
    {
        $this->authorize('view', $serviceHistory);

        return view('app.service_histories.show', compact('serviceHistory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceHistory $serviceHistory)
    {
        $this->authorize('update', $serviceHistory);

        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $bandPositions = BandPosition::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.service_histories.edit',
            compact(
                'serviceHistory',
                'companyHomes',
                'companyHosts',
                'bandPositions',
                'jobTitles',
                'users'
            )
        );
    }

    /**
     * @param \App\Http\Requests\ServiceHistoryUpdateRequest $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ServiceHistoryUpdateRequest $request,
        ServiceHistory $serviceHistory
    ) {
        $this->authorize('update', $serviceHistory);

        $validated = $request->validated();

        $serviceHistory->update($validated);

        return redirect()
            ->route('service-histories.edit', $serviceHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceHistory $serviceHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceHistory $serviceHistory)
    {
        $this->authorize('delete', $serviceHistory);

        $serviceHistory->delete();

        return redirect()
            ->route('service-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
