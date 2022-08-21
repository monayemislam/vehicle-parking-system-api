<?php

namespace App\Http\Controllers\CancelledRequest;

use App\Http\Controllers\Controller;
use App\Models\CancelledRequest\CancelledRequest;
use Illuminate\Http\Request;

class CancelledRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();
        if(CancelledRequest::where('cancelled_by',$id)->exists())
        {
            $cancelledRequestData = CancelledRequest::with('parkingRequest','whoCancelledRequest')->where('cancelled_by',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'Cancelled Requests',
                'data'=>$cancelledRequestData
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'You didn\'t cancel any request'
            ]);
        }
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
            'parking_request_id'=>'integer|required',
            'cancelled_by'=>'integer|required',
            'cancel_comment'=>'string|required'
        ]);

        $newCancelledRequest = CancelledRequest::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'Request has been Cancelled',
            'data'=>$newCancelledRequest
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
