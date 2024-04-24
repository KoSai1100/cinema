<?php

namespace App\Http\Controllers;

use App\Models\CinemaBuilding;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::all();
        return view('backend.showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $cinemaBuildings = CinemaBuilding::all();
        return view('backend.showtimes.create', compact('movies', 'cinemaBuildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'cinema_building_id' => 'required',
            'start_time' => 'required|date',
        ]);

        Showtime::create($request->all());

        return redirect()->route('showtimes.index')->with('success', 'Showtime created successfully.');
    }

    public function edit(Showtime $showtime)
    {
        $movies = Movie::all();
        $cinemaBuildings = CinemaBuilding::all();
        return view('backend.showtimes.edit', compact('showtime', 'movies', 'cinemaBuildings'));
    }

    public function update(Request $request, Showtime $showtime)
    {
        $request->validate([
            'movie_id' => 'required',
            'cinema_building_id' => 'required',
            'start_time' => 'required|date',
        ]);

        $showtime->update($request->all());

        return redirect()->route('showtimes.index')->with('success', 'Showtime updated successfully.');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Showtime deleted successfully.');
    }
}
