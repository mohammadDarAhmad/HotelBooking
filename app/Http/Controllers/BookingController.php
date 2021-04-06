<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use App\Http\Resources\RoomCollection;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return new BookingCollection($bookings);
    }


        public function show(Booking $booking){
       return new BookingResource($booking);
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'user_id' => 'required|string',
                'room_id' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }
        return Booking::create($request->all());
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
                'user_id' => 'required|string',
                'room_id' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }
        $booking->update($request->all());

        return  $booking;
    }

    public function destroy(Booking $booking){
        try {
            return $booking->delete();
        } catch (\Exception $e) {
        }
    }


}
