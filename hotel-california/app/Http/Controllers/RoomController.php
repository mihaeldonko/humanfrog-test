<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Reservation;
use App\Mail\ThankYouMail;
use App\Mail\HotelNotificationMail;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::all()->toArray();

        return view('rooms', [
            'rooms' => $rooms
        ]);
    }

    public function reservation() {

        $rooms = Room::all()->toArray();

        return view('reservation', [
            'rooms' => $rooms
        ]);
    }

    public function makeReservation(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());

        Mail::to($request->email)->send(new ThankYouMail($reservation));
        Mail::to('miha.donko@gmail.com')->send(new HotelNotificationMail($reservation));

        return redirect()->back()->with('success', 'Hvala za oddano povpraševanje!');
    }
}
