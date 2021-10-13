<?php

namespace App\Http\Controllers\Api;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\ProfileCollection;

class ReligionProfilesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Religion $religion)
    {
        $this->authorize('view', $religion);

        $search = $request->get('search', '');

        $profiles = $religion
            ->profiles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProfileCollection($profiles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Religion $religion
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Religion $religion)
    {
        $this->authorize('create', Profile::class);

        $validated = $request->validate([
            'gender' => ['required', 'in:male,female,other'],
            'phone_number' => [
                'nullable',
                'unique:profiles,phone_number',
                'max:20',
                'string',
            ],
            'blood_group' => ['nullable', 'in:tidak tahu,o,a,b,ab'],
            'no_ktp' => [
                'nullable',
                'unique:profiles,no_ktp',
                'max:30',
                'string',
            ],
            'no_npwp' => [
                'nullable',
                'unique:profiles,no_npwp',
                'max:30',
                'string',
            ],
            'address_ktp' => ['nullable', 'max:255', 'string'],
            'address_domisili' => ['nullable', 'max:255', 'string'],
            'status_domisili' => [
                'nullable',
                'in:rumah sendiri,rumah sewa,rumah keluarga',
            ],
            'user_id' => ['required', 'exists:users,id'],
            'address_npwp' => ['required', 'max:255', 'string'],
            'nama_ibu' => ['required', 'max:255', 'string'],
        ]);

        $profile = $religion->profiles()->create($validated);

        return new ProfileResource($profile);
    }
}
