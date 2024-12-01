<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'price', 'short_description', 'long_description', 'main_image'
    ];

    // Define the relationship with RoomImage
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

