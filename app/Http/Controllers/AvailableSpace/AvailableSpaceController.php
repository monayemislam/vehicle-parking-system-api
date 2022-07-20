<?php

namespace App\Http\Controllers\AvailableSpace;

use App\Http\Controllers\Controller;
use App\Models\AvailableSpace\AvailableSpace;
use Illuminate\Http\Request;

class AvailableSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeUserId = auth()->id();

        if(AvailableSpace::where('user_id',$activeUserId)->exists())
        {
            $data = AvailableSpace::with('user','spaceType')->where('user_id',$activeUserId)->get();
            return response()->json([
                'status'=>true,
                'message'=>'Available Space Found',
                'data'=> $data
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Available Space Not Found'
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
        $availableSpaceInfo = $request->validate([
            'space_name'=>'string|required|unique:available_spaces|max:255',
            'space_type_id'=>'integer|required',
            'user_id'=>'integer|required',
            'latitude'=>'string|required',
            'longitude'=>'string|required',
            'status'=>'boolean|required',
            'comments'=>'string|required'
        ]);

        $newAvailableSpace = AvailableSpace::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'You have added a Space Successfully',
            'data'=>$newAvailableSpace
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
