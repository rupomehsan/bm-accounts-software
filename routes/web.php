<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('login', function () {

    $check_auth_user = User::where('email', request()->email)->orWhere('uid', request()->email)->first();

    if ($check_auth_user && Hash::check('@12345678', $check_auth_user->password)) {
        DB::table('oauth_access_tokens')->where("user_id", $check_auth_user->id)->update(['revoked' => 1]);
        // auth()->login($check_auth_user, request()->remember);
        $data['access_token'] = $check_auth_user->createToken('accessToken')->accessToken;
        $data['user'] = $check_auth_user;
        return response()->json($data, 200);
    } else {
        return response()->json('user not found', 417);
    }
});

Route::get('/test-telegram', function () {

    $bot_token = env('BOT_TOKEN');
    $method = "sendMessage";

    $parameters = [
        // 'chat_id' => 812239513,//shifat
        'chat_id' => 6555657006,
        'text' => "this is texdt message",
    ];

    $url = "https://api.telegram.org/bot$bot_token/$method";

    $response = Http::get($url . '?chat_id=' . $parameters['chat_id'] . '&text=' . $parameters['text']);
    return $response->json();
});
