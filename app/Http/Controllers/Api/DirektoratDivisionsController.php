<?php

namespace App\Http\Controllers\Api;

use App\Models\Direktorat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\DivisionCollection;

class DirektoratDivisionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Direktorat $direktorat)
    {
        $this->authorize('view', $direktorat);

        $search = $request->get('search', '');

        $divisions = $direktorat
            ->divisions()
            ->search($search)
            ->latest()
            ->paginate();

        return new DivisionCollection($divisions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Direktorat $direktorat
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Direktorat $direktorat)
    {
        $this->authorize('create', Division::class);

        $validated = $request->validate([
            'name' => [
                'required',
                'unique:divisions,name',
                'max:100',
                'string',
            ],
        ]);

        $division = $direktorat->divisions()->create($validated);

        return new DivisionResource($division);
    }
}
