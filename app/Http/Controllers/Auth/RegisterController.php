<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    public function create()
    {
        $roles = User::roles();
        return view('auth.register', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'integer', 'min:10'],
            'role' => ['required', 'integer', 'in:' . User::ROLE_ADMIN . ',' . User::ROLE_AGENT . ',' . User::ROLE_USER],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'state_id' => $request->state,
            'password' => Hash::make($request->password),
        ]);
        Mail::to($user->email)->send(new WelcomeMail($user));
        Auth::login($user);

        if ($user->role === User::ROLE_ADMIN) {
            return redirect('/admin/dashboard');
        } elseif ($user->role === User::ROLE_AGENT) {
            return redirect('/agent/dashboard');
        }

        return redirect('/dashboard');
    }
}
