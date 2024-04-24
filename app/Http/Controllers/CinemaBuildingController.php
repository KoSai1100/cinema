<?php

namespace App\Http\Controllers;

use App\Models\CinemaBuilding;
use Illuminate\Http\Request;

class CinemaBuildingController extends Controller
{
    public function index()
    {
        $cinemaBuildings = CinemaBuilding::all();
        return view('backend.cinema_building.index', compact('cinemaBuildings'));
    }

    public function create()
    {
        return view('backend.cinema_building.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('cinema-building-images'), $imageName);

        CinemaBuilding::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'image' => $imageName,
        ]);

        return redirect()->route('cinema_building.index')->with('success', 'Cinema Building created successfully.');
    }

    public function edit(CinemaBuilding $cinemaBuilding)
    {
        return view('backend.cinema_building.edit', compact('cinemaBuilding'));
    }

    public function update(Request $request, CinemaBuilding $cinemaBuilding)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image'))
        {
            $image_path = public_path("cinema-building-images/".$cinemaBuilding->image);

            if (file_exists($image_path)) {

                @unlink($image_path);

            }
            $image =  $request->image->getClientOriginalName();
            $request->image->move(public_path("/cinema-building-images"),$image);

        $cinemaBuilding->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'image'=>$image
        ]);

        return redirect()->route('cinema_building.index')->with('success', 'Cinema Building updated successfully.');
    }
}
    public function destroy(int $id)
    {
        $cinemaBuilding= CinemaBuilding::findOrFail($id);

        $image_path = public_path("cinema-building-images/".$cinemaBuilding->image);

           if (file_exists($image_path)) {

               @unlink($image_path);

           }
        $cinemaBuilding->delete();
        return redirect()->route('cinema_building.index')->with('success', 'Cinema Building deleted successfully.');
    }
}
