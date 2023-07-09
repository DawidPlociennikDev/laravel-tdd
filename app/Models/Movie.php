<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'release_year', 'director', 'description', 'genre', 'cover'
    ];

    protected $cast = ['genre' => 'array'];
}
