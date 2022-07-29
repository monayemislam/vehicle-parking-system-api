<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle\VehicleType;
use Illuminate\Support\Facades\Auth;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicleTypes = VehicleType::all();
        return response()->json([
            'status'=>true,
            'message'=>"Vehicle List",
            'data'=>$vehicleTypes
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
            'name'=>'string|unique:vehicle_types|required',
            'vehicle_description'=>'string'
        ]);

        $VehicleTypeData = VehicleType::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Vehicle Type Created Successfully',
            'data'=>$VehicleTypeData
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
        
        if(VehicleType::where('id',$id)->exists())
        {
            $vehicleTypes = VehicleType::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'Vehicle Type found',
                'data'=>$vehicleTypes
            ]);
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Vehicle Type Not found'
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
        $request->validate([
            'name'=>'string|unique:vehicle_types',
            'vehicle_description'=>'string'
        ]);
        $vehicleTypeInstance = VehicleType::where('id',$id)->first();
        $vehicleTypeInstance->name = !empty($request->name) ? $request->name : $vehicleTypeInstance->name;
        $vehicleTypeInstance->vehicle_description = !empty($request->vehicle_description) ? $request->vehicle_description : $vehicleTypeInstance->name;
        $vehicleTypeInstance->save();

        return response()->json([
            'status'=>true,
            'message'=>'Vehicle Type Updated Successfully',
            'data'=>$vehicleTypeInstance
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(VehicleType::where('id',$id)->exists())
        {
            $vehicleTypes = VehicleType::where('id',$id)->first();
            $vehicleTypes->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Vehicle Type Deleted Successfully',
                'data'=>$vehicleTypes
            ]);
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Vehicle Type Not found'
            ]);
        }
    }
}
