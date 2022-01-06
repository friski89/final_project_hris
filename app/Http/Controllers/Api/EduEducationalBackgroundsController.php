<?php

namespace App\Http\Controllers\Api;

use App\Models\Edu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalBackgroundResource;
use App\Http\Resources\EducationalBackgroundCollection;

class EduEducationalBackgroundsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Edu $edu)
    {
        $this->authorize('view', $edu);

        $search = $request->get('search', '');

        $educationalBackgrounds = $edu
            ->educationalBackgrounds()
            ->search($search)
            ->latest()
            ->paginate();

        return new EducationalBackgroundCollection($educationalBackgrounds);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Edu $edu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Edu $edu)
    {
        $this->authorize('create', EducationalBackground::class);

        $validated = $request->validate([
            'emp_no' => ['required', 'max:100', 'string'],
            'employee_name' => ['required', 'max:100', 'string'],
            'institution_name' => ['required', 'max:255', 'string'],
            'faculty' => ['required', 'max:255', 'string'],
            'major' => ['required', 'max:255', 'string'],
            'graduate_date' => ['required', 'date'],
            'cost_category' => ['required', 'max:255', 'string'],
            'scholarship_institution' => ['nullable', 'max:255', 'string'],
            'gpa' => ['required', 'max:255', 'string'],
            'gpa_scale' => ['required', 'max:255', 'string'],
            'default' => ['required', 'max:255', 'string'],
            'start_year' => ['required', 'date'],
            'city' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $educationalBackground = $edu
            ->educationalBackgrounds()
            ->create($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }
}
