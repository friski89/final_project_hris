<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        // if (!auth()->attempt($credentials)) {
        //     throw ValidationException::withMessages([
        //         'username' => [trans('auth.failed')],
        //     ]);
        // }

        if (!auth()->attempt($request->only('username', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('username',$request->username)->firstOrFail();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'data' => $user,'access_token' => $token, 'token_type' => 'Bearer', 
        ]);
    }
}
