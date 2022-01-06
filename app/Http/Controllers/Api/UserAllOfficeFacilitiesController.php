<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeFacilitiesResource;
use App\Http\Resources\OfficeFacilitiesCollection;

class UserAllOfficeFacilitiesController extends Controller
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

        $allOfficeFacilities = $user
            ->allOfficeFacilities()
            ->search($search)
            ->latest()
            ->paginate();

        return new OfficeFacilitiesCollection($allOfficeFacilities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', OfficeFacilities::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'jenis_fasilitas' => ['required', 'max:255', 'string'],
            'jenis_pemberian' => ['required', 'max:255', 'string'],
            'nilai_perolehan' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
        ]);

        $officeFacilities = $user->allOfficeFacilities()->create($validated);

        return new OfficeFacilitiesResource($officeFacilities);
    }
}
