<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use Illuminate\Http\Request;
use App\Http\Requests\EduStoreRequest;
use App\Http\Requests\EduUpdateRequest;

class EduController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Edu::class);

        $search = $request->get('search', '');

        $edus = Edu::search($search)
            ->latest()
            ->paginate(5);

        return view('app.edus.index', compact('edus', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Edu::class);

        return view('app.edus.create');
    }

    /**
     * @param \App\Http\Requests\EduStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EduStoreRequest $request)
    {
        $this->authorize('create', Edu::class);

        $validated = $request->validated();

        $edu = Edu::create($validated);

        return redirect()
            ->route('edus.edit', $edu)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Edu $edu)
    {
        $this->authorize('view', $edu);

        return view('app.edus.show', compact('edu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Edu $edu)
    {
        $this->authorize('update', $edu);

        return view('app.edus.edit', compact('edu'));
    }

    /**
     * @param \App\Http\Requests\EduUpdateRequest $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function update(EduUpdateRequest $request, Edu $edu)
    {
        $this->authorize('update', $edu);

        $validated = $request->validated();

        $edu->update($validated);

        return redirect()
            ->route('edus.edit', $edu)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Edu $edu)
    {
        $this->authorize('delete', $edu);

        $edu->delete();

        return redirect()
            ->route('edus.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
