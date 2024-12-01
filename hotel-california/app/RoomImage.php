<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    protected $fillable = [
        'room_id', 'image_url'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
