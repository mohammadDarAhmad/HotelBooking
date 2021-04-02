<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class RoomsController extends Controller
{
    public function index(){
        return   Room::all();
    }

    public function show($id){
        return Room::find($id);
    }

    public function store(Request $request){
        return Room::create($request->all());

    }


    public function update(Request $request,$id)
    {
        $room = Room::find($id);
        $room->update($request->all());
        return $room;
    }

    public function destroy($id){
     return Room::destroy($id);
    }

    public function roomAvailable(){
       return DB::table('rooms')
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->whereNull('bookings.room_id')
            ->get();
    }

}
