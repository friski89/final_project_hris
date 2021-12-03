<?php

namespace App\Http\Controllers;

use App\Models\employeeResign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class userResignController extends Controller
{
    public function store(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'note' => 'required'
        ]);
        $validatedData['user_id'] = $user->id;
        $validatedData['start_date'] = $user->date_in;
        $validatedData['end_date'] = date('Y-m-d');
        employeeResign::create($validatedData);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
