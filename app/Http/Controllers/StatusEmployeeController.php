<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusEmployee;
use App\Http\Requests\StatusEmployeeStoreRequest;
use App\Http\Requests\StatusEmployeeUpdateRequest;

class StatusEmployeeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StatusEmployee::class);

        $search = $request->get('search', '');

        $statusEmployees = StatusEmployee::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.status_employees.index',
            compact('statusEmployees', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StatusEmployee::class);

        return view('app.status_employees.create');
    }

    /**
     * @param \App\Http\Requests\StatusEmployeeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusEmployeeStoreRequest $request)
    {
        $this->authorize('create', StatusEmployee::class);

        $validated = $request->validated();

        $statusEmployee = StatusEmployee::create($validated);

        return redirect()
            ->route('status-employees.edit', $statusEmployee)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StatusEmployee $statusEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StatusEmployee $statusEmployee)
    {
        $this->authorize('view', $statusEmployee);

        return view('app.status_employees.show', compact('statusEmployee'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StatusEmployee $statusEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StatusEmployee $statusEmployee)
    {
        $this->authorize('update', $statusEmployee);

        return view('app.status_employees.edit', compact('statusEmployee'));
    }

    /**
     * @param \App\Http\Requests\StatusEmployeeUpdateRequest $request
     * @param \App\Models\StatusEmployee $statusEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(
        StatusEmployeeUpdateRequest $request,
        StatusEmployee $statusEmployee
    ) {
        $this->authorize('update', $statusEmployee);

        $validated = $request->validated();

        $statusEmployee->update($validated);

        return redirect()
            ->route('status-employees.edit', $statusEmployee)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StatusEmployee $statusEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StatusEmployee $statusEmployee)
    {
        $this->authorize('delete', $statusEmployee);

        $statusEmployee->delete();

        return redirect()
            ->route('status-employees.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
