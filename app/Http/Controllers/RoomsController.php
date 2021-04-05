<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class RoomsController extends Controller
{
    /**
     *
     * - rooms ------------------------------------------------------
     *
     * @SWG\Get(
     * 		path="/api/v1/rooms",
     * 		tags={"Rooms"},
     * 		operationId="get all rooms",
     * 		summary="Fetch rooms details",

     *
     *        @SWG\Response(response=400, description="Success)
     * ")

     * 	)
     *
     */
    public function index()
    {
        return Room::all();
    }
    /**
     *
     * - rooms ------------------------------------------------------
     *
     * @SWG\Get(
     * 		path="/api/v1/rooms/{id}",
     * 		tags={"Rooms"},
     * 		operationId="get rooms by id",
     * 		summary="Fetch room details by id",
     * @SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="RID",
     * 		),
     *
     *        @SWG\Response(response=200, description="Success"),
     * 	)
     *
     */
    public function show($id)
    {
        return Room::find($id);
    }
    /**
     *
     * - rooms ------------------------------------------------------
     *
     * @SWG\Post(
     * 		path="/api/v1/rooms",
     * 		tags={"Rooms"},
     * 		operationId="Add new room",
     * 		summary="Add new room",
     *     consumes={"multipart/form-data"},
     *     produces={"application/json"},
     * @SWG\Parameter(
     * 			name="name",
     *          in="formData",
     * 			required=true,
     * 			type="string",
     * 		),
     *        @SWG\Parameter(
     * 			name="created_at",
     *          in="query",
     * 			required=false,
     *           type="string",
     *           format="date-time",
     * 		),
     *
     *        @SWG\Response(response=201, description="Success"),
     * 	)
     *
     */
    public function store(Request $request)
    {
        print($request);
        return Room::create($request->all());

    }

    /**
     *
     * - rooms ------------------------------------------------------
     *
     * 	@SWG\Put(
     * 		path="/api/v1/rooms/{id}",
     * 		tags={"Rooms"},
     * 		operationId="Put room by id",
     * 		summary="you can't put the room by id",
     *      consumes={"application/x-www-form-urlencoded"},
     *     produces={"application/json"},
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     *  @SWG\Parameter(
     * 			name="name",
     *          in="formData",
     * 			required=true,
     * 			type="string",
     * 		),
     *
     *        @SWG\Response(response=200, description="Success"),
     * 	)
     *
     */
    public function update(Request $request, $id)
    {

        $room= Room::find($id)->update($request->all());
        return $room;

    }

    public function roomAvailable(){
        return DB::table('rooms')
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->whereNull('bookings.room_id')
            ->get();
    }
    /**
     *
     * 	@SWG\Delete(
     * 		path="/api/v1/rooms/{id}",
     * 		tags={"Rooms"},
     * 		operationId="deleteRoom",
     * 		summary="Remove Room entry",
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     *
     *        @SWG\Response(response=200, description="Success"),
     * 	)

     * 	)
     *
     */
    public function destroy($id){
     return Room::destroy($id);
    }


}
