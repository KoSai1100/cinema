<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable=['movie_id','cinema_building_id'];
    protected $dates=['start_time'];
    protected $table='showtimes';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema_building()
    {
        return $this->belongsTo(CinemaBuilding::class);
    }
    public function seat()
    {
        return $this->hasMany(Seat::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
