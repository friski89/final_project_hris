<?php

namespace App\Http\Controllers\Api;

use App\Models\Edu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyResource;
use App\Http\Resources\FamilyCollection;

class EduFamiliesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Edu $edu)
    {
        $this->authorize('view', $edu);

        $search = $request->get('search', '');

        $families = $edu
            ->families()
            ->search($search)
            ->latest()
            ->paginate();

        return new FamilyCollection($families);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Edu $edu)
    {
        $this->authorize('create', Family::class);

        $validated = $request->validate([
            'employee_name' => ['required', 'max:255', 'string'],
            'emp_no' => ['required', 'max:255', 'string'],
            'marital_status' => [
                'nullable',
                'in:menikah,belum menikah,duda,janda',
            ],
            'no_kk' => ['required', 'max:255', 'string'],
            'family_name' => ['required', 'max:255', 'string'],
            'nik_id' => [
                'required',
                'unique:families,nik_id',
                'max:255',
                'string',
            ],
            'place_of_birth' => ['required', 'max:255', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female,other'],
            'date_marital' => ['nullable', 'date'],
            'religion' => ['required', 'in:islam,kristen,hindu,budha,konghucu'],
            'citizenship' => ['required', 'max:255', 'string'],
            'work' => ['nullable', 'max:255', 'string'],
            'health_status' => ['required', 'numeric'],
            'blood_group' => ['required', 'in:tidak tahu,o,a,b,ab'],
            'blood_rhesus' => ['nullable', 'max:255', 'string'],
            'house_number' => ['nullable', 'max:255', 'string'],
            'handphone_number' => ['nullable', 'max:255', 'string'],
            'emergency_number' => ['nullable', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'province' => ['required', 'max:255', 'string'],
            'postal_code' => ['required', 'max:255', 'string'],
            'relationship' => ['required', 'in:suami,istri,anak'],
            'alive' => ['required', 'numeric'],
            'urutan' => ['required', 'numeric'],
            'dependent_status' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $family = $edu->families()->create($validated);

        return new FamilyResource($family);
    }
}
