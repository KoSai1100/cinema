<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;
use App\Models\CinemaBuilding;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function home()
    {
        $movies=Movie::all();
        return view('frontend.index',compact('movies'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function seatplan(Request $request, int $id)
    {
        $movie=Movie::find($id);

        $showtimes=Showtime::where('movie_id',$id)->first();

        $cinema_building_name=$showtimes->cinema_building->name;

        return view('frontend.movie-seat-plan',compact('movie','cinema_building_name','showtimes'));
    }


// public function checkSeatAvailability(Request $request)
// {
//     // Retrieve data from the request
//     Log::debug($request->all());
//     $movieId = $request->movieId;
//     $showtimeId = $request->showtime_id;
//     $totalprice = $request->totalPrice;

//     Log::debug($totalprice);

//     // Retrieve movie, showtime, and cinema building information
//     $movie = Movie::find($movieId);
//     $showtime = Showtime::find($showtimeId);
//     $cinemaBuilding = $showtime->cinema_building->name;

//     // Check seat availability
//     $selectedSeats = explode(',', $request->input('seats'));
//     $bookedSeats = Seat::where('showtime_id', $showtimeId)->pluck('seat_number')->toArray();

//     // Check if any of the selected seats are already booked
//     foreach ($selectedSeats as $seatNumber) {
//         if (in_array($seatNumber, $bookedSeats))
//         {
//             // If any selected seat is already booked, return an error response
//             return response()->json(['available' => false, 'message' => 'The selected seats are already booked.']);
//         }
//         else{
//             return response()->json(['available' => true]);
//         }

//     }

//     Log::debug($movie);
//     Log::debug($selectedSeats);
//     Log::debug($showtime);
//     Log::debug($cinemaBuilding);
//     Log::debug($totalprice);

//      session([
//         'movie' => $movie,
//         'selectedSeats' => $selectedSeats,
//         'showtime' => $showtime,
//         'cinemaBuilding' => $cinemaBuilding,
//         'totalprice'=>$totalprice
//     ]);


// }

public function checkSeatAvailability(Request $request)
{
    // Retrieve data from the request
    Log::debug($request->all());
    $movieId = $request->input('movieId');
    $showtimeId = $request->input('showtime_id');
    $totalprice = $request->input('totalPrice');

    // Retrieve movie, showtime, and cinema building information
    $movie = Movie::find($movieId);
    $showtime = Showtime::find($showtimeId);
    $cinemaBuilding = $showtime->cinema_building->name;

    // Check seat availability
    $selectedSeats = explode(',', $request->input('seats'));
    $bookedSeats = Booking::where('showtime_id', $showtimeId)
    ->whereIn('seatnumber', $selectedSeats)
    ->pluck('seatnumber')
    ->toArray();

    // Check if any of the selected seats are already booked
    foreach ($selectedSeats as $seatNumber) {
        if (in_array($seatNumber, $bookedSeats)) {
            // If any selected seat is already booked, return an error response
            return response()->json(['available' => false, 'message' => 'The selected seats are already booked.']);
        }
    }

    // If none of the selected seats are booked, store data in session
    session([
        'movie' => $movie,
        'selectedSeats' => $selectedSeats,
        'showtime' => $showtime,
        'cinemaBuilding' => $cinemaBuilding,
        'totalprice' => $totalprice
    ]);

    Log::debug($movie);
    Log::debug($selectedSeats);
    Log::debug($showtime);

    Log::debug($totalprice);

    // Return success response
    return response()->json(['available' => true]);
}


public function showCheckout(Request $request)
{
    // Retrieve data from the request
    $movie = session('movie');
    $selectedSeats = session('selectedSeats');
    $showtime = session('showtime');
    $cinemaBuilding = session('cinemaBuilding');
    $totalprice=session('totalprice');

    // dd($movie,$showtime,$cinemaBuilding,$totalprice);
    // dd($totalprice);
    // Render the checkout page with the retrieved data
    return view('frontend.movie-checkout', compact('movie', 'selectedSeats', 'showtime', 'cinemaBuilding','totalprice'));
}

public function bookSeats(Request $request)
{
    Log::debug($request->all());
    // Check if the user is authenticated
    if (auth()->check()) {
        // If the user is authenticated, retrieve the user ID
        $userId = auth()->user()->id;
    } else {
        // If the user is not authenticated, register the user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no=$request->input('phone_no');
        // Add other user fields as needed
        $user->save();

        // Retrieve the newly created user ID
        $userId = $user->id;
    }

    // Retrieve other data from the request
    $showtimeId = $request->input('showtime_id');
    $selectedSeats = $request->input('seats');
    $totalPrice = $request->input('totalprice');

    Log::debug($showtimeId);
    // Store booking details in the database
    $booking = new Booking();
    $booking->user_id = $userId;
    $booking->showtime_id = $showtimeId;
    $booking->seatnumber = $selectedSeats;
    $booking->totalprice = $totalPrice;
    $booking->save();

    // Optionally, you can clear the session data if needed
    // session()->forget(['movie', 'selectedSeats', 'showtime', 'cinemaBuilding', 'totalprice']);

    // Redirect or return a response as needed
    return response()->json(['success' => true, 'message' => 'Seats booked successfully.']);
}


public function bookinglist()
{
    $userId = auth()->id(); // Get the authenticated user's ID
    $bookings = Booking::where('user_id', $userId)->get();
    Log::debug($userId);
    Log::debug($bookings);
    return view('frontend.bookinglist', ['bookings' => $bookings]); // Return the view with the bookings data
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();
    return redirect()->route('booking.list')->with('success', 'Booking deleted successfully.');
}


}
