<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EducationalBackground;
use App\Http\Requests\EducationalBackgroundStoreRequest;
use App\Http\Requests\EducationalBackgroundUpdateRequest;

class EducationalBackgroundController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EducationalBackground::class);

        $search = $request->get('search', '');

        $educationalBackgrounds = EducationalBackground::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.educational_backgrounds.index',
            compact('educationalBackgrounds', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EducationalBackground::class);

        $users = User::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');

        return view(
            'app.educational_backgrounds.create',
            compact('users', 'edus')
        );
    }

    /**
     * @param \App\Http\Requests\EducationalBackgroundStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationalBackgroundStoreRequest $request)
    {
        $this->authorize('create', EducationalBackground::class);

        $validated = $request->validated();

        $educationalBackground = EducationalBackground::create($validated);

        return redirect()
            ->route('educational-backgrounds.edit', $educationalBackground)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('view', $educationalBackground);

        return view(
            'app.educational_backgrounds.show',
            compact('educationalBackground')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('update', $educationalBackground);

        $users = User::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');

        return view(
            'app.educational_backgrounds.edit',
            compact('educationalBackground', 'users', 'edus')
        );
    }

    /**
     * @param \App\Http\Requests\EducationalBackgroundUpdateRequest $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function update(
        EducationalBackgroundUpdateRequest $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('update', $educationalBackground);

        $validated = $request->validated();

        $educationalBackground->update($validated);

        return redirect()
            ->route('educational-backgrounds.edit', $educationalBackground)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EducationalBackground $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('delete', $educationalBackground);

        $educationalBackground->delete();

        return redirect()
            ->route('educational-backgrounds.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
