<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        return Booking::all();

    }
    public function show(Booking $booking){
        return $booking;
    }


    public function store(Request $request){
        return Booking::create($request->all());


    }

    public function update(Request $request, Booking $booking)
    {

        $booking->update($request->all());
        return  $booking;
    }

    public function destroy(Booking $booking){
       return $booking->delete();
    }


}
