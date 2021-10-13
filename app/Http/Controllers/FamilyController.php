<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use App\Models\User;
use App\Models\Family;
use Illuminate\Http\Request;
use App\Http\Requests\FamilyStoreRequest;
use App\Http\Requests\FamilyUpdateRequest;

class FamilyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Family::class);

        $search = $request->get('search', '');

        $families = Family::search($search)
            ->latest()
            ->paginate(5);

        return view('app.families.index', compact('families', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Family::class);

        $users = User::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');

        return view('app.families.create', compact('users', 'edus'));
    }

    /**
     * @param \App\Http\Requests\FamilyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyStoreRequest $request)
    {
        $this->authorize('create', Family::class);

        $validated = $request->validated();

        $family = Family::create($validated);

        return redirect()
            ->route('families.edit', $family)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Family $family)
    {
        $this->authorize('view', $family);

        return view('app.families.show', compact('family'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Family $family)
    {
        $this->authorize('update', $family);

        $users = User::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');

        return view('app.families.edit', compact('family', 'users', 'edus'));
    }

    /**
     * @param \App\Http\Requests\FamilyUpdateRequest $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyUpdateRequest $request, Family $family)
    {
        $this->authorize('update', $family);

        $validated = $request->validated();

        $family->update($validated);

        return redirect()
            ->route('families.edit', $family)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Family $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Family $family)
    {
        $this->authorize('delete', $family);

        $family->delete();

        return redirect()
            ->route('families.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
