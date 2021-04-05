<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     *
     * - booking ------------------------------------------------------
     *
     * @SWG\Get(
     * 		path="/api/v1/booking",
     * 		tags={"Booking"},
     * 		operationId="get all booking",
     * 		summary="Fetch rooms details",

     *
     *        @SWG\Response(response=200, description="Success"),
     *        @SWG\Response(response=400, description="Invalid username/password supplied)
     * ")

     * 	)
     *
     */
    public function index(){
        return Booking::all();

    }


    /**
     *
     * - booking ------------------------------------------------------
     *
     * @SWG\Get(
     * 		path="/api/v1/booking/{id}",
     * 		tags={"Booking"},
     * 		operationId="get booking by id",
     * 		summary="Fetch boking details by id",
     * @SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="RID",
     * 		),
     *
     *        @SWG\Response(response=200, description="Success"),
     *        @SWG\Response(response=400, description="Invalid username/password supplied)
     * ")

     * 	)
     *
     */
    public function show($id){
        return Booking::find($id);
    }

    /**
     *
     * - rooms ------------------------------------------------------
     *
     * @SWG\Post(
     * 		path="/api/v1/booking",
     * 		tags={"Booking"},
     * 		operationId="Add new booking",
     * 		summary="Add new booking",
     *     consumes={"multipart/form-data"},
     *     produces={"application/json"},
     * @SWG\Parameter(
     * 			name="user_id",
     *          in="formData",
     * 			required=true,
     * 			type="number",
     * 		),
     *
     *       * @SWG\Parameter(
     * 			name="room_id",
     *          in="formData",
     * 			required=true,
     * 			type="integer",
     * 		),

     *
     *        @SWG\Response(response=201, description="Success"),
     * 	)
     *
     */
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
