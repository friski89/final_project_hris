<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceFacilityResource;
use App\Http\Resources\InsuranceFacilityCollection;

class UserInsuranceFacilitiesController extends Controller
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

        $insuranceFacilities = $user
            ->insuranceFacilities()
            ->search($search)
            ->latest()
            ->paginate();

        return new InsuranceFacilityCollection($insuranceFacilities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', InsuranceFacility::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'jenis_asuransi' => ['required', 'max:255', 'string'],
            'provider_asuransi' => ['required', 'max:255', 'string'],
            'nama_peserta' => ['required', 'max:255', 'string'],
            'status_peserta' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'peserta_manfaat' => ['required', 'max:255', 'string'],
        ]);

        $insuranceFacility = $user->insuranceFacilities()->create($validated);

        return new InsuranceFacilityResource($insuranceFacility);
    }
}
