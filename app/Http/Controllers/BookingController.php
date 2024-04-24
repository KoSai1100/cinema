<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showlist()
    {
        $bookings=Booking::all();

        return view('backend.booking.index',compact('bookings'));
    }
}
