<?php

namespace App\Http\Controllers\profile;

use App\Models\Edu;
use App\Models\User;
use App\Models\Family;
use App\Models\Province;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\EducationalBackground;
use App\Http\Resources\FamilyResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FamilyStoreRequest;
use App\Http\Requests\FamilyUpdateRequest;
use App\Http\Requests\MyProfileUpdateRequest;
use App\Http\Resources\EducationalBackgroundResource;
use App\Http\Requests\EducationalBackgroundUpdateRequest;

class MyProfileController extends Controller
{
    //return index

    public function index()
    {
        $provinces = Province::Get();
        $religions = Religion::pluck('name', 'id');
        return view('profile/index', compact('provinces', 'religions'));
    }

    public function update(MyProfileUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $profile = [];

        $validated = $request->validated();
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|file',
        ]);
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $profile['avatar'] = $request->file('avatar')->store('/', 'avatars');
        }

        $validated['vaccine1'] = $request->input('vaccine1') ? true : false;
        $validated['vaccine2'] = $request->input('vaccine2') ? true : false;
        $validated['not_vaccine'] = $request->input('not_vaccine') ? true : false;

        $profile['email'] = $request->email;

        // check profile
        $checkProfile = $user->profile()->count();

        if ($checkProfile > 0) {
            $user->profile()->update($validated);
        } else {
            $user->profile()->create($validated);
        }

        $user->update($profile);

        return redirect()
            ->route('Myprofile')
            ->withSuccess(__('crud.common.saved'));
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()
            ->route('Myprofile')
            ->withSuccess(__('crud.common.saved'));
    }

    public function educational_background_lists(Request $request, EducationalBackground $eduBack)
    {
        $arr = array();
        foreach (Auth::user()->educationalBackgrounds as $educationBackground) {
            $eduBackground['id'] = $educationBackground->id ?? "-";
            $eduBackground['employee_name'] = $educationBackground->employee_name ?? "-";
            $eduBackground['user_id'] = $educationBackground->user_id ?? "-";
            $eduBackground['institution_name'] = $educationBackground->institution_name ?? "-";
            $eduBackground['faculty'] = $educationBackground->faculty ?? "-";
            $eduBackground['major'] = $educationBackground->major ?? "-";
            $eduBackground['edu_name'] = $educationBackground->edu->name ?? "-";
            $eduBackground['graduate_date'] = date("m/d/Y", strtotime($educationBackground->graduate_date)) ?? "-";
            $eduBackground['cost_category'] = $educationBackground->cost_category ?? "-";
            $eduBackground['scholarship_institution'] = $educationBackground->scholarship_institution ?? "-";
            $eduBackground['gpa'] = $educationBackground->gpa ?? "-";
            $eduBackground['gpa_scale'] = $educationBackground->gpa_scale ?? "-";
            $eduBackground['start_year'] = date("m/d/Y", strtotime($educationBackground->start_year)) ?? "-";
            $eduBackground['city'] = $educationBackground->city ?? "-";
            $eduBackground['state'] = $educationBackground->state ?? "-";
            $eduBackground['country'] = $educationBackground->country ?? "-";
            $eduBackground['user_id'] = $educationBackground->user_id ?? "-";
            $eduBackground['edu_id'] = $educationBackground->edu_id ?? "-";
            $eduBackground['emp_no'] = $educationBackground->emp_no ?? "-";
            $eduBackground['default'] = $educationBackground->default ?? "-";
            $arr[] = $eduBackground;
        }


        // $arr = Auth::user()->educationalBackgrounds;

        return response($arr, 200)
            ->header('Content-Type', 'application/json');
    }

    public function edu_list(Request $request)
    {
        $arr = array();
        $arr['edu_list'] = Edu::Get();
        $arr['emp_no'] = Auth::user()->id;
        $arr['emp_name'] = Auth::user()->name;
        return response($arr, 200)
            ->header('Content-Type', 'application/json');
    }

    public function update_edu_background(
        EducationalBackgroundUpdateRequest $request,
        EducationalBackground $educationalBackground
    ) {
        // $this->authorize('update', $educationalBackground);

        $validated = $request->validated();


        // dd($request->id);
        $eduBackgroundData = $educationalBackground->find($request->id);

        $eduBackgroundData->update($validated); //$educationalBackground->update($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }

    public function insert_edu_background(
        EducationalBackgroundUpdateRequest $request,
        EducationalBackground $educationalBackground
    ) {
        // $this->authorize('update', $educationalBackground);

        $validated = $request->validated();

        $educationalBackground = EducationalBackground::create($validated);

        return new EducationalBackgroundResource($educationalBackground);
    }

    public function destroy_edu_background(
        Request $request,
        EducationalBackground $educationalBackground
    ) {
        $this->authorize('delete', $educationalBackground);

        $eduBackgroundData = $educationalBackground->find($request->id);

        $eduBackgroundData->delete();

        return response()->noContent();
    }

    public function family_list(Request $request)
    {
        $arr = Auth::user()->families;

        return response($arr, 200)
            ->header('Content-Type', 'application/json');
    }

    public function insert_family(
        FamilyStoreRequest $request
    ) {
        $this->authorize('create', Family::class);

        $validated = $request->validated();

        $family = Family::create($validated);

        return new FamilyResource($family);
    }

    public function update_family(FamilyUpdateRequest $request, Family $family)
    {
        $this->authorize('update', $family);

        $validated = $request->validated();

        $validated['vaccine1'] = $request['vaccine1'] == "true" ? 1 : 0;
        $validated['vaccine2'] = $request['vaccine2'] == "true" ? 1 : 0;
        $validated['not_vaccine'] = $request['not_vaccine'] == "true" ? 1 : 0;
        // dd($validated);
        // $family->update($validated);

        // return new FamilyResource($family);
        $familyData = Family::find($request->id);

        $x = $familyData->update($validated);
        return new FamilyResource($familyData);
    }

    public function destroy_family(
        Request $request,
        Family $family
    ) {
        $this->authorize('delete', $family);

        $families = $family->find($request->id);

        $families->delete();

        return response()->noContent();
    }
}
