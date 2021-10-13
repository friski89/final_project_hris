<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Profile::class);

        $search = $request->get('search', '');

        $profiles = Profile::search($search)
            ->latest()
            ->paginate(5);

        return view('app.profiles.index', compact('profiles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Profile::class);

        $users = User::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');

        return view('app.profiles.create', compact('users', 'religions'));
    }

    /**
     * @param \App\Http\Requests\ProfileStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {
        $this->authorize('create', Profile::class);

        $validated = $request->validated();

        $profile = Profile::create($validated);

        return redirect()
            ->route('profiles.edit', $profile)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Profile $profile)
    {
        $this->authorize('view', $profile);

        return view('app.profiles.show', compact('profile'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $users = User::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');

        return view(
            'app.profiles.edit',
            compact('profile', 'users', 'religions')
        );
    }

    /**
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $validated = $request->validated();

        $profile->update($validated);

        return redirect()
            ->route('profiles.edit', $profile)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Profile $profile)
    {
        $this->authorize('delete', $profile);

        $profile->delete();

        return redirect()
            ->route('profiles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
