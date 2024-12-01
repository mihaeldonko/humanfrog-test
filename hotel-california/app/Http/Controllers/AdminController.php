<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Room;

class AdminController extends Controller
{
    public function reservations(){
        $reservations = Reservation::all()->toArray();

        return view('admin.reservations', [
            'reservations' => $reservations
        ]);
    }

    public function rooms()
    {
        $rooms = Room::all()->toArray();

        return view('admin.rooms', [
            'rooms' => $rooms
        ]);
    }

    public function updateRoom(Request $request)
    {
        $room = Room::find($request->id);
        if ($room) {
            $room->name = $request->name;
            $room->short_description = $request->short_description;
            $room->price = $request->price;
            $room->save();
            return response()->json(['message' => 'Room updated successfully!'], 200);
        }
        return response()->json(['message' => 'Room not found.'], 404);
    }

}
