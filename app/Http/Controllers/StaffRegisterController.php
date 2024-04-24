<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffRegisterController extends Controller
{
    // public function create()
    // {
    //     return view('frontend.register');
    // }

    // public function store(Request $request)
    // {
    // $cleanData = $request->validate([
    //     'name' => 'required',
    //     'email' => 'required',
    //     'photo' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
    //     'password' => 'required'
    // ]);

    // $imageName = $request->image->getClientOriginalName();
    // $request->image->move(public_path('movies'), $imageName);

    // $staff=Staff::create([
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'photo' => $imageName,
    //     'password'=>$request->password

    // ]);
    // auth()->login($staff);
    // return redirect('/dashboard')->with('success', 'Entry created successfully'.$staff->name);
    // }

    public function adminlogout(Request $request)
    {
        dd('hello');
        auth()->logout();
        return redirect('/login')->with('success','Good Bye'); // Redirect to the desired URL
    }

    public function login()
    {
        return view('backend.login');
    }

    public function loginstore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $guard = $this->determineGuard($credentials['email']);


        if (auth($guard)->attempt($credentials)) {
            if ($guard === 'staff') {

                return redirect('/admin')->with('success', 'Welcome back, staff member!');
            } else {
                // Redirect to the staff route or other desired route
                return redirect('/')->with('success', 'Welcome back, regular staff!');
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
