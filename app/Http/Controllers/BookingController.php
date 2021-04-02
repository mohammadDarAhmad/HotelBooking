<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        return Booking::all();

    }
    public function show($id){
        return Booking::find($id);
    }


    public function store(Request $request){
        return Booking::create($request->all());


    }

    public function update(Request $request, $id)
    {

        $booking = Booking::find($id);
        $booking->update($request->all());
        return  $booking;
    }

    public function destroy($id){
        return Booking::destroy($id);
    }


}
