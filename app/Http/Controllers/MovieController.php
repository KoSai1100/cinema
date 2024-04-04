<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        dd(Movie::with('cinemas')->get());
        $movies = Movie::with('cinemas')->get();

        dd($movies);
        return view('backend.movies.index',compact('movies'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.movies.create',['cinemas'=>Cinema::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'cast' => 'required',
    //         'director' => 'required',
    //         'start_date'=>'required',
    //         'end_date'=>'required',
    //         'image' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
    //         'cinema_id' => 'required',

    //     ]);

    //     if($request->hasFile('image'))
    //     {
    //         $imageName = $request->image->getClientOriginalName();
    //         $request->image->move(public_path("/movies"),$imageName);
    //     }

    //     Movie::create([
    //         'name' => $request->name,
    //         'cast' => $request->cast,
    //         'director' => $request->director,
    //         'start_date'=>$request->start_date,
    //         'end_date'=>$request->end_date,
    //         'image' => $imageName,
    //         'cinema_id' =>$request->cinema_id,
    //     ]);

    //     return redirect()->route('movie.index')->with('success','');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cast' => 'required',
            'director' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
            'cinema_id' => 'required', // Adjust validation as per your requirements
        ]);

        // Upload and save the image
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('movies'), $imageName);

        // Create the movie with cinema_id
        $movie = Movie::create([
            'name' => $request->name,
            'cast' => $request->cast,
            'director' => $request->director,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imageName,
            'cinema_id' => $request->cinema_id, // Assuming cinema_id is available in the request
        ]);

        return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $movie = Movie::findOrFail($id);
        $cinema = Cinema::all();
        return view('backend.movies.edit',compact('movie','cinema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $movie = Movie::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'cast' => 'required',
            'director' => 'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|mimetypes:image/png,image/jpg,image/jpeg',
            'cinema_id' => 'required',

        ]);

        if($request->hasFile('image'))
        {
            $image_path = public_path("movies/".$movie->image);

            if (file_exists($image_path)) {

                @unlink($image_path);

            }
            $image =  $request->image->getClientOriginalName();
            $request->image->move(public_path("/movies"),$image);
            $movie->update([

                'name' => $request->name,
                'cast' => $request->cast,
                'director' => $request->director,
                'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
                'image'=> $image,
                'cinema_id' => $request->cinema_id
            ]);
            return redirect()->route('movie.index');
        }

        $movie->update([
            'name' => $request->name,
            'cast' => $request->cast,
            'director' => $request->director,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'cinema_id' => $request->cinema_id
        ]);

        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        $movie= Movie::findOrFail($id);

        $image_path = public_path("movies/".$movie->image);

           if (file_exists($image_path)) {

               @unlink($image_path);

           }
           $movie->delete();
        return redirect()->route('movie.index')->with('success','');
    }
}
