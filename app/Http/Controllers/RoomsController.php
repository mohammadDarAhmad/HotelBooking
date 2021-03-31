<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models;

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
        return Room::creat();
    }


    public function update(Request $request,$id)
    {
        $room = Room::find($id);
        $room->update($request->all());
        return $room;
    }

    public function destroy($id){
     return Room::deleted($id);
    }


}
