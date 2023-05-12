<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())){
            $request->session()->regenerate();
            $user = User::where('email', $request->get('email'));

            return to_route('users.show', $user);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);
    }
}
