<?php

namespace App\Http\Controllers\Api;

use App\Models\JobFamily;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;

class JobFamilyUsersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('view', $jobFamily);

        $search = $request->get('search', '');

        $users = $jobFamily
            ->users()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobFamily $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobFamily $jobFamily)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required'],
            'avatar' => ['nullable', 'file'],
            'nik_telkom' => [
                'nullable',
                'unique:users,nik_telkom',
                'max:255',
                'string',
            ],
            'nik_company' => [
                'required',
                'unique:users,nik_company',
                'max:255',
                'string',
            ],
            'date_in' => ['required', 'date'],
            'band_position_id' => ['required', 'exists:band_positions,id'],
            'job_grade_id' => ['nullable', 'exists:job_grades,id'],
            'job_function_id' => ['nullable', 'exists:job_functions,id'],
            'city_recuite_id' => ['required', 'exists:city_recuites,id'],
            'status_employee_id' => ['required', 'exists:status_employees,id'],
            'company_home_id' => ['required', 'exists:company_homes,id'],
            'date_sk' => ['nullable', 'date'],
            'company_host_id' => ['nullable', 'exists:company_hosts,id'],
            'sub_status_id' => ['nullable', 'exists:sub_statuses,id'],
            'unit_id' => ['required', 'exists:units,id'],
            'place_of_birth' => ['required', 'max:150', 'string'],
            'division_id' => ['required', 'exists:divisions,id'],
            'date_of_birth' => ['required', 'date'],
            'work_location_id' => ['required', 'exists:work_locations,id'],
            'age' => ['required', 'numeric'],
            'job_title_id' => ['required', 'exists:job_titles,id'],
            'edu_id' => ['required', 'exists:edus,id'],
            'direktorat_id' => ['required', 'exists:direktorats,id'],
            'departement_id' => ['required', 'exists:departements,id'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
            'tanggal_kartap' => ['required', 'date'],
            'no_sk_kartap' => [
                'required',
                'unique:users,no_sk_kartap',
                'max:255',
                'string',
            ],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $user = $jobFamily->users()->create($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }
}
