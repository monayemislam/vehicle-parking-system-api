<?php

namespace App\Http\Controllers\Space;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Space\SpaceType;

class SpaceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaceType = SpaceType::all();
        $response = [
            'status'=>true,
            'message'=>'Space Type List',
            'data'=>$spaceType
        ];
        return response($response,201);
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
        //create a new space
        $spaceTypeInfo=$request->validate([
            'name'=>'string|unique:space_types|required',
            'description'=>'string|required'
        ]);

        $newSpaceType = SpaceType::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"A new Space Type has been Created Successfully !",
            'data'=>$newSpaceType
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
        //Find a specific space type
        $spaceTypeId = $id;
        if(SpaceType::where('id',$spaceTypeId)->exists()){
            $singleSpaceTypeInfo = SpaceType::where('id',$spaceTypeId)->first();
            return response()->json([
                'status'=>true,
                'message'=>"Space Type Found",
                'data'=>$singleSpaceTypeInfo
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>"Space Type Not Found",
            ]);
        }
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
        //Update Space type info
        $spaceTypeId = $id;
        if(SpaceType::where('id',$spaceTypeId)->exists()){
            
            //validate input
            $request->validate([
                'name'=>'unique:space_types',
            ]);

            $spaceType = SpaceType::find($spaceTypeId);
            $spaceType->name = !empty($request->name) ? $request->name : $spaceType->name;
            $spaceType->description = !empty($request->description) ? $request->description: $spaceType->description;
            $spaceType->save();

            return response()->json([
                'status'=>true,
                'message'=> 'Space Type has been Updated Successfuly',
                'data' => $spaceType
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>"Space Type Not Found"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a specific space type
        $spaceTypeId = $id;
        if(SpaceType::where('id',$spaceTypeId)->exists()){
            $singleSpaceTypeInfo = SpaceType::where('id',$spaceTypeId)->first();
            $singleSpaceTypeInfo ->delete();
            return response()->json([
                'status'=>true,
                'message'=>"Space Type Deleted Successfully",
                'data'=>$singleSpaceTypeInfo
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>"Space Type Not Found",
            ]);
        }
    }
}
