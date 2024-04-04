<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{

    public function create()
    {
        return view('backend.cinemas.create',['cinemas'=>Cinema::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
        ]);

        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("/cinemas"), $imageName);
        }

        Cinema::create([
            'location' => $request->location,
            'image' => $imageName,
        ]);

        return redirect()->route('cinema.create')->with('success', '');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cinema = Cinema::findOrfail($id);
        return view('backend.cinemas.edit',['cinema'=>$cinema]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cinema = cinema::findOrfail($id);
        $validatedData = $request->validate([
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
        ]);

        if($request->hasFile('image'))
        {
            $image_path = public_path("cinemas/".$cinema->image);

            if (file_exists($image_path)) {

                @unlink($image_path);

            }
            $image =  $request->image->getClientOriginalName();
            $request->image->move(public_path("/cinemas"),$image);
            $cinema->update([
                'location' => $request->location,
                'image'=> $image,

            ]);
            return redirect()->route('cinema.create');
        }

        $cinema->update([
            'location' => $request->location,

        ]);

        return redirect()->route('cinema.create')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        $cinema= Cinema::findOrFail($id);

        $image_path = public_path("cinemas/".$cinema->image);

           if (file_exists($image_path)) {

               @unlink($image_path);

           }
           $cinema->delete();
        return redirect()->route('cinema.create')->with('success','');
    }

}
