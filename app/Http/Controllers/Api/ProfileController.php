<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\ProfileCollection;
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
            ->paginate();

        return new ProfileCollection($profiles);
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

        return new ProfileResource($profile);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Profile $profile)
    {
        $this->authorize('view', $profile);

        return new ProfileResource($profile);
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

        return new ProfileResource($profile);
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

        return response()->noContent();
    }
}
