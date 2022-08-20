<?php

namespace App\Http\Controllers\ParkingRequest;

use App\Http\Controllers\Controller;
use App\Models\ParkingRequest\ParkingRequest;
use Illuminate\Http\Request;

class ParkingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userId = auth()->id();
       if (ParkingRequest::where('requestor_id',$userId)->exists())
       {
        $parkingRequests = ParkingRequest::with('requestor','availableSpace','paymentMethod')->where('requestor_id',$userId)->get();
        return response()->json([
            'status'=>true,
            'message'=>'All Parking Requests',
            'data'=>$parkingRequests
        ]);
       }
       else{
        return response()->json([
            'status'=>false,
            'message'=>'You didn;t make any request yet.',
        ]);
       }
    }

    public function adminIndex(){
        $parkingRequests = ParkingRequest::with('requestor','availableSpace','paymentMethod')->get();
        return response()->json([
            'status'=>true,
            'message'=>'All Parking Requests',
            'data'=>$parkingRequests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'requestor_id'=>'required|integer',
            'available_space_id'=>'required|integer',
            'requestor_latitude'=>'string|required',
            'requestor_longitude'=>'string|required',
            'start_date'=>'date_format:Y-m-d|required|after_or_equal:today',
            'start_time'=>'date_format:H:i:s|required',
            'end_date'=>'date_format:Y-m-d|required|after_or_equal:start_date',
            'end_time'=>'date_format:H:i:s|required|after_or_equal:start_time',
            'payment_method_id'=>'required|integer'
        ]);
        $newParkingRequests = ParkingRequest::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'A new parking request has been created',
            'data'=>$newParkingRequests
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
