<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyHomeResource;
use App\Http\Resources\CompanyHomeCollection;
use App\Http\Requests\CompanyHomeStoreRequest;
use App\Http\Requests\CompanyHomeUpdateRequest;

class CompanyHomeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CompanyHome::class);

        $search = $request->get('search', '');

        $companyHomes = CompanyHome::search($search)
            ->latest()
            ->paginate();

        return new CompanyHomeCollection($companyHomes);
    }

    /**
     * @param \App\Http\Requests\CompanyHomeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyHomeStoreRequest $request)
    {
        $this->authorize('create', CompanyHome::class);

        $validated = $request->validated();

        $companyHome = CompanyHome::create($validated);

        return new CompanyHomeResource($companyHome);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('view', $companyHome);

        return new CompanyHomeResource($companyHome);
    }

    /**
     * @param \App\Http\Requests\CompanyHomeUpdateRequest $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function update(
        CompanyHomeUpdateRequest $request,
        CompanyHome $companyHome
    ) {
        $this->authorize('update', $companyHome);

        $validated = $request->validated();

        $companyHome->update($validated);

        return new CompanyHomeResource($companyHome);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('delete', $companyHome);

        $companyHome->delete();

        return response()->noContent();
    }
}
