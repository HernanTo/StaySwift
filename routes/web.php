<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user = Socialite::driver('google')->user();
    $userExits = User::where('google_id', $user->id)->get()->first();
    if(!$userExits){
        $newUser = User::create([
            'google_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => '',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'profile_photo_path' => $user->avatar
        ]);
        Auth::login($newUser);
        return view('dashboard');

    }else{
        Auth::login($userExits);
        return view('dashboard');
    }
});
