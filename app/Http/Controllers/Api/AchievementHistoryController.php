<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AchievementHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\AchievementHistoryResource;
use App\Http\Resources\AchievementHistoryCollection;
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
            ->paginate();

        return new AchievementHistoryCollection($achievementHistories);
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

        return new AchievementHistoryResource($achievementHistory);
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

        return new AchievementHistoryResource($achievementHistory);
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

        return new AchievementHistoryResource($achievementHistory);
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

        return response()->noContent();
    }
}
