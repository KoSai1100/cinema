<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCinema extends Model
{
    use HasFactory;

    protected $table = 'cinema_movie'; // Assuming your pivot table is named cinema_movie

    protected $fillable = ['movie_id', 'cinema_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saved(function ($movie) {
    //         // Get the cinema ID associated with the movie
    //         $cinemaId = $movie->cinema_id;

    //         // Attach the cinema to the movie using the pivot table
    //         if ($cinemaId) {
    //             $movie->cinemas()->syncWithoutDetaching($cinemaId);
    //         }
    //     });
    // }

}
