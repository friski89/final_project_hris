<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StatusEmployee;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatusEmployeeResource;
use App\Http\Resources\StatusEmployeeCollection;
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
            ->paginate();

        return new StatusEmployeeCollection($statusEmployees);
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

        return new StatusEmployeeResource($statusEmployee);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StatusEmployee $statusEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StatusEmployee $statusEmployee)
    {
        $this->authorize('view', $statusEmployee);

        return new StatusEmployeeResource($statusEmployee);
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

        return new StatusEmployeeResource($statusEmployee);
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

        return response()->noContent();
    }
}
