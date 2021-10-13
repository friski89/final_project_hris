<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalBackgroundResource;
use App\Http\Resources\EducationalBackgroundCollection;

class UserEducationalBackgroundsController extends Controller
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

        $educationalBackgrounds = $user
            ->educationalBackgrounds()
            ->search($search)
            ->latest()
            ->paginate();

        return new EducationalBackgroundCollection($educationalBackgrounds);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
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
            'edu_id' => ['required', 'exists:edus,id'],
        ]);

        $educationalBackground = $user
            ->educationalBackgrounds()
            ->create($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }
}
