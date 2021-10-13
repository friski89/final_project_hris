<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyHost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyHostResource;
use App\Http\Resources\CompanyHostCollection;
use App\Http\Requests\CompanyHostStoreRequest;
use App\Http\Requests\CompanyHostUpdateRequest;

class CompanyHostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompanyHost::class);

        $search = $request->get('search', '');

        $companyHosts = CompanyHost::search($search)
            ->latest()
            ->paginate();

        return new CompanyHostCollection($companyHosts);
    }

    /**
     * @param \App\Http\Requests\CompanyHostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyHostStoreRequest $request)
    {
        $this->authorize('create', CompanyHost::class);

        $validated = $request->validated();

        $companyHost = CompanyHost::create($validated);

        return new CompanyHostResource($companyHost);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('view', $companyHost);

        return new CompanyHostResource($companyHost);
    }

    /**
     * @param \App\Http\Requests\CompanyHostUpdateRequest $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompanyHostUpdateRequest $request,
        CompanyHost $companyHost
    ) {
        $this->authorize('update', $companyHost);

        $validated = $request->validated();

        $companyHost->update($validated);

        return new CompanyHostResource($companyHost);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('delete', $companyHost);

        $companyHost->delete();

        return response()->noContent();
    }
}
