<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Models\Room;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class RoomController extends Controller
{
    public function index()
    {
        $rooms=  Room::all();
        return new RoomCollection($rooms);
}

    public function show($room)
    {
        return new RoomResource($room);
    }
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'name' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return validation_response($validator->errors());
        }
        return Room::create($request->all());
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
                'name' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return validation_response($validator->errors());
        }
        $room->update($request->all());

        return  $room;
    }

    public function roomAvailable(){
       $rooms = DB::table('rooms')
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->whereNull('bookings.room_id')
            ->get();
       return new RoomCollection($rooms);
    }

    public function destroy(Room $room){
        try {
            return $room->delete();
        } catch (\Exception $e) {
        }
    }


}
