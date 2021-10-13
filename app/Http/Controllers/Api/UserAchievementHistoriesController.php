<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AchievementHistoryResource;
use App\Http\Resources\AchievementHistoryCollection;

class UserAchievementHistoriesController extends Controller
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

        $achievementHistories = $user
            ->achievementHistories()
            ->search($search)
            ->latest()
            ->paginate();

        return new AchievementHistoryCollection($achievementHistories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', AchievementHistory::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:255', 'string'],
            'employee_name' => ['required', 'max:255', 'string'],
            'award_name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'institution' => ['required', 'max:255', 'string'],
            'no_sk' => ['required', 'max:255', 'string'],
            'office_name' => ['required', 'max:255', 'string'],
            'position_name' => ['required', 'max:255', 'string'],
            'remarks' => ['nullable', 'max:255', 'string'],
        ]);

        $achievementHistory = $user->achievementHistories()->create($validated);

        return new AchievementHistoryResource($achievementHistory);
    }
}
