<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable =['name','cast','director','image','start_date','end_date','cinema_id'];
    protected $table='movie';

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class);
    }
}
