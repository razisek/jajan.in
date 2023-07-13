<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister(Request $request)
    {
        $username = $request->user;
        return view('auth.register', compact('username'));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('page.login')->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('page.dashboard');
        }

        return redirect()->route('page.login')->withSuccess('Email/Password salah!');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:4|unique:users,username|regex:/^[A-Za-z0-9_-]*$/',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('page.register')->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request, &$user) {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->page()->create([
                'category_id' => null,
                'unit_id' => 1,
            ]);

            $user->page->balance()->create([
                'balance' => 0,
            ]);
        });


        Auth::login($user);
        return redirect()->route('page.dashboard');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('page.dashboard');
            } else {
                $newUser = User::updateOrCreate([
                    'email' => $user->email
                ], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'username' => $user->email,
                    'password' => encrypt('SyuliTSyeKaliPaswordnya8217**')
                ]);

                $newUser->page()->create([
                    'category_id' => null,
                    'unit_id' => 1,
                ]);

                $newUser->page->balance()->create([
                    'balance' => 0,
                ]);

                $newUser->addMedia($user->avatar)->toMediaCollection('avatar');

                Auth::login($newUser);
                return redirect()->route('page.dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
