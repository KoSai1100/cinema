<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable=['location','image'];
    protected $table='cinema';

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
