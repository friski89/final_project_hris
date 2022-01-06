<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use App\Models\User;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\JobGrade;
use App\Models\Division;
use App\Models\JobTitle;
use App\Models\JobFamily;
use App\Models\SubStatus;
use App\Models\Direktorat;
use App\Models\JobFunction;
use App\Models\CityRecuite;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\BandPosition;
use App\Models\WorkLocation;
use App\Models\StatusEmployee;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', User::class);

        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate(5);

        return view('app.users.index', compact('users', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', User::class);

        $bandPositions = BandPosition::pluck('name', 'id');
        $jobGrades = JobGrade::pluck('name', 'id');
        $jobFamilies = JobFamily::pluck('name', 'id');
        $jobFunctions = JobFunction::pluck('name', 'id');
        $cityRecuites = CityRecuite::pluck('name', 'id');
        $statusEmployees = StatusEmployee::pluck('name', 'id');
        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $subStatuses = SubStatus::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $divisions = Division::pluck('name', 'id');
        $workLocations = WorkLocation::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');
        $direktorats = Direktorat::pluck('name', 'id');
        $departements = Departement::pluck('name', 'id');

        $roles = Role::get();

        return view(
            'app.users.create',
            compact(
                'bandPositions',
                'jobGrades',
                'jobFamilies',
                'jobFunctions',
                'cityRecuites',
                'statusEmployees',
                'companyHomes',
                'companyHosts',
                'subStatuses',
                'units',
                'divisions',
                'workLocations',
                'jobTitles',
                'edus',
                'direktorats',
                'departements',
                'roles'
            )
        );
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validated();
        $validated['username'] = $request->nik_company;
        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('/', 'avatars');
        }

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $this->authorize('view', $user);

        return view('app.users.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $bandPositions = BandPosition::pluck('name', 'id');
        $jobGrades = JobGrade::pluck('name', 'id');
        $jobFamilies = JobFamily::pluck('name', 'id');
        $jobFunctions = JobFunction::pluck('name', 'id');
        $cityRecuites = CityRecuite::pluck('name', 'id');
        $statusEmployees = StatusEmployee::pluck('name', 'id');
        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $subStatuses = SubStatus::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $divisions = Division::pluck('name', 'id');
        $workLocations = WorkLocation::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');
        $direktorats = Direktorat::pluck('name', 'id');
        $departements = Departement::pluck('name', 'id');

        $roles = Role::get();

        return view(
            'app.users.edit',
            compact(
                'user',
                'bandPositions',
                'jobGrades',
                'jobFamilies',
                'jobFunctions',
                'cityRecuites',
                'statusEmployees',
                'companyHomes',
                'companyHosts',
                'subStatuses',
                'units',
                'divisions',
                'workLocations',
                'jobTitles',
                'edus',
                'direktorats',
                'departements',
                'roles'
            )
        );
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();
        $validated['username'] = $request->nik_company;
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            $validated['avatar'] = $request->file('avatar')->store('/', 'avatars');
        }

        $user->update($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
