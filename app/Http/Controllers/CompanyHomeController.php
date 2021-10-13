<?php

namespace App\Http\Controllers;

use App\Models\CompanyHome;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.company_homes.index',
            compact('companyHomes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CompanyHome::class);

        return view('app.company_homes.create');
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

        return redirect()
            ->route('company-homes.edit', $companyHome)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('view', $companyHome);

        return view('app.company_homes.show', compact('companyHome'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHome $companyHome
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CompanyHome $companyHome)
    {
        $this->authorize('update', $companyHome);

        return view('app.company_homes.edit', compact('companyHome'));
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

        return redirect()
            ->route('company-homes.edit', $companyHome)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('company-homes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
