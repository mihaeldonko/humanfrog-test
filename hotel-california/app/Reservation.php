<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'arrival_date',
        'departure_date',
        'room_id',
        'name',
        'email',
        'phone',
        'message',
        'price',
    ];

    protected $casts = [
        'arrival_date' => 'datetime',
        'departure_date' => 'datetime',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reservation) {
            $room = $reservation->room;
            if ($room) {
                $days = $reservation->departure_date->diffInDays($reservation->arrival_date);
                $reservation->price = $days * $room->price;
            }
        });

        static::updating(function ($reservation) {
            $room = $reservation->room;
            if ($room) {
                $days = $reservation->departure_date->diffInDays($reservation->arrival_date);
                $reservation->price = $days * $room->price;
            }
        });
    }
}
