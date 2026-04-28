<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre_id',
        'description',
        'file',
        'duration',
        'cover',
        'release_date',
        'age_rating',
    ];

    function genre(){
        return $this->belongsTo(genre::class);
    }
}
