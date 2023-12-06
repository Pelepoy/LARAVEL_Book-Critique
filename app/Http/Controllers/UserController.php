<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function register()
    {
        $title = 'Register | Author';

        return view('author.register', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name'      => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
            'email'     => 'required|unique:users|max:255',
            'password'  => 'required|confirmed|min:8',
        ]);

        User::create([
            'name'              =>   $validated['name'],
            'email'             =>   $validated['email'],
            'password'          =>   bcrypt($validated['password']),
            'email_verified_at' =>   now(),
            'remember_token'    =>   csrf_token(),
        ]);

        return to_route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        $title = 'Login | Author';
        if (View::exists('author.login')) {
            return view('author.login', [
                'title' => $title,
            ]);
        } else {
            return abort(404, 'Page not found');
        }
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();
            return to_route('books.index')->with('success', 'Login successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('success', 'Logout successfully.');
    }
}
