<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class LandingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(24);
        $bookings->transform(fn ($item) => [
            'id' => $item->id,
            'event_name' => $item->event_name,
            'room_id' => $item->room_id,
            'check_in' => $item->check_in->format('d-m-Y H:m'),
            'check_out' => $item->check_out->format('d-m-Y H:m'),
            'guest_name' => $item->guest_name,
            'guest_email' => $item->guest_email
        ]);

        $rooms = Room::with('branch', 'book')
            ->where('is_published', true)
            ->paginate(10);

        $rooms->transform(fn ($item) => [
            'id' => $item->id,
            'name' => $item->name,
            'branch' => $item->branch->name,
            'facilities' => $item->facilities,
            'book' => $item->book->count()
        ]);

        return view('landing.index', compact('rooms'));
    }

    public function detail(Room $room){
        return $room;
    }
}
