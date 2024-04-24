<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
      */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_no'=>['required','string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no'=>$request->phone_no,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'phone_no' => ['required', 'string'],
    //         'photo'=>['nullable'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'role' => ['required', 'in:customer,admin'], // Assuming you have a 'role' field in your registration form
    //     ]);

    //     if ($request->role === '') {
    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone_no' => $request->phone_no,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         Auth::login($user);

    //         return redirect(route('home')); // Redirect to customer dashboard

    //     } elseif ($request->role === 'admin') {
    //         $staff = Staff::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone_no' => $request->phone_no,
    //             'photo'=>$request->photo,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         Auth::guard('staff')->login($staff); // Assuming you have a separate guard for admin authentication

    //         return redirect(route('dashboard')); // Redirect to admin dashboard
    //     }

    //     // Handle other roles or errors here
    // }
}

