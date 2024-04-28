<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = DB::table('staff')->get();
        return view("backend.staff.index", compact("staffs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.staff.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        "name"=> "required",
        "email" => "required|unique:staff,email",
        'photo' =>'max:2048|mimes:png,jpg',
        "password" => "required"
        ]);
        if($request->hasFile('photo'))
        {
            $imageName = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('staffs'), $imageName);


            Staff::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $imageName,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('staff.index')->with('success','');
        }
        Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    return redirect()->route('staff.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $staff = Staff::find($id);
        return view('backend.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $staff = Staff::find($id);
        $request->validate([
            "name"=> "required",
            "email" => "required",
            'photo' =>'max:2048|mimes:png,jpg',
            ]);

            if($request->hasFile('photo'))
            {
                $image_path = public_path("staffs/".$staff->photo);

                if (file_exists($image_path)) {

                    @unlink($image_path);

                }
                $image =  $request->photo->getClientOriginalName();
                $request->photo->move(public_path("/staffs"),$image);
                $staff->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'photo' => $image,
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->route('staff.index');
            }

            $staff->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        return redirect()->route('staff.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $staff = Staff::find($id);
        if($staff->photo)
        {
            $path = public_path('uploads/staff/'.$staff->photo);
            File::delete($path);
        }
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
