<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaBuilding extends Model
{
    use HasFactory;
    protected $fillable=['name','address','city','state','image'];
    protected $table='cinema_building';

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
