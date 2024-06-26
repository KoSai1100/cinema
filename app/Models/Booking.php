<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable=['user_id','showtime_id','seatnumber','totalprice','promocode'];
    protected $table='booking';

    public function showtime()
{
    return $this->belongsTo(Showtime::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
