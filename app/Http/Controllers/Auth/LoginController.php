<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {




        if (!$request->input('email') && !$request->input('password')) {
            return response()->json(
                [
                    'status' => 'validation_error',
                    'errors' => [
                        'email' => "This email field is required",
                        'password' => "This password field is required",
                    ]
                ],
                422
            );
        }

        if (!$request->input('email')) {
            return response()->json(
                [
                    'status' => 'validation_error',
                    'errors' => [
                        'email' => "This email field is required",
                    ]
                ],
                422
            );
        }
        if (!$request->input('password')) {
            return response()->json(
                [
                    'status' => 'validation_error',
                    'errors' => [
                        'password' => "This password field is required",
                    ]
                ],
                422
            );
        }

        $check_auth_user = User::where('email', $request->email)->orWhere('uid', $request->email)->first();

        if ($check_auth_user->is_blocked) {
            return response()->json(['status' => 'error', 'message' => 'Sorry,you are blocked'], 404);
        }

        if ($check_auth_user && Hash::check($request->password, $check_auth_user->password)) {
            DB::table('oauth_access_tokens')->where("user_id", $check_auth_user->id)->update(['revoked' => 1]);
            $data['access_token'] = $check_auth_user->createToken('accessToken')->accessToken;
            $data['user'] = $check_auth_user;
            return response()->json($data, 200);
        } else {
            if ($check_auth_user->no_of_attempt > 2) {
                $check_auth_user->is_blocked = 1;
            }
            $check_auth_user->no_of_attempt = $check_auth_user->no_of_attempt + 1;
            $check_auth_user->save();
            return response()->json(['status' => 'error', 'message' => 'Sorry,user not found'], 404);
        }
    }
}
