<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AchievementHistory;
use App\Http\Requests\AchievementHistoryStoreRequest;
use App\Http\Requests\AchievementHistoryUpdateRequest;

class AchievementHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AchievementHistory::class);

        $search = $request->get('search', '');

        $achievementHistories = AchievementHistory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.achievement_histories.index',
            compact('achievementHistories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AchievementHistory::class);

        $users = User::pluck('name', 'id');

        return view('app.achievement_histories.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\AchievementHistoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AchievementHistoryStoreRequest $request)
    {
        $this->authorize('create', AchievementHistory::class);

        $validated = $request->validated();

        $achievementHistory = AchievementHistory::create($validated);

        return redirect()
            ->route('achievement-histories.edit', $achievementHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AchievementHistory $achievementHistory
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        AchievementHistory $achievementHistory
    ) {
        $this->authorize('view', $achievementHistory);

        return view(
            'app.achievement_histories.show',
            compact('achievementHistory')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AchievementHistory $achievementHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        AchievementHistory $achievementHistory
    ) {
        $this->authorize('update', $achievementHistory);

        $users = User::pluck('name', 'id');

        return view(
            'app.achievement_histories.edit',
            compact('achievementHistory', 'users')
        );
    }

    /**
     * @param \App\Http\Requests\AchievementHistoryUpdateRequest $request
     * @param \App\Models\AchievementHistory $achievementHistory
     * @return \Illuminate\Http\Response
     */
    public function update(
        AchievementHistoryUpdateRequest $request,
        AchievementHistory $achievementHistory
    ) {
        $this->authorize('update', $achievementHistory);

        $validated = $request->validated();

        $achievementHistory->update($validated);

        return redirect()
            ->route('achievement-histories.edit', $achievementHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AchievementHistory $achievementHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        AchievementHistory $achievementHistory
    ) {
        $this->authorize('delete', $achievementHistory);

        $achievementHistory->delete();

        return redirect()
            ->route('achievement-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
