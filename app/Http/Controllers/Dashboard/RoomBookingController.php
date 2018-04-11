<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\RoomBooking;
use Illuminate\Support\Facades\Auth;


class RoomBookingController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::with('room')
            ->where('user_id', Auth::user()->id)
            ->paginate(10);

        return view('dashboard.booking.room_booking')->with([
            'room_bookings' => $room_bookings
        ]);
    }

}