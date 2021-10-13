<?php

namespace App\Http\Controllers;

use App\Models\CompanyHost;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.company_hosts.index',
            compact('companyHosts', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CompanyHost::class);

        return view('app.company_hosts.create');
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

        return redirect()
            ->route('company-hosts.edit', $companyHost)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('view', $companyHost);

        return view('app.company_hosts.show', compact('companyHost'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyHost $companyHost
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CompanyHost $companyHost)
    {
        $this->authorize('update', $companyHost);

        return view('app.company_hosts.edit', compact('companyHost'));
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

        return redirect()
            ->route('company-hosts.edit', $companyHost)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('company-hosts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
