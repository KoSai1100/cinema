<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function create()
{
    return view('frontend.register');
}

public function store(Request $request)
{
$cleanData = $request->validate([
    'name' => 'required',
    'email' => 'required',
    'phone_no' => 'required',
    'password' => 'required'
]);

$user=User::create($cleanData);
auth()->login($user);
return redirect('/')->with('success', 'Entry created successfully'.$user->name);
}

public function logout(Request $request)
{
    auth()->logout();
    return redirect('/')->with('success','Good Bye'); // Redirect to the desired URL
}

public function login()
{
    return view('frontend.login');
}

public function loginstore(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $guard = $this->determineGuard($credentials['email']); // Assuming this method returns the correct guard name

    // dd($guard);
    // dd(auth($guard)->attempt($credentials));

    if (auth($guard)->attempt($credentials)) {
        if ($guard === 'staff') {
            return redirect('/dashboard')->with('success', 'Welcome back, staff member!');
        } else {
            return redirect('/')->with('success', 'Welcome back, regular user!');
        }
    } else {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}


private function determineGuard($email)
{
    return Staff::where('email', $email)->exists() ? 'staff' : 'web';
}

}
