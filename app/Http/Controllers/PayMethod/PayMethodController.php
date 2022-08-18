<?php

namespace App\Http\Controllers\PayMethod;

use App\Http\Controllers\Controller;
use App\Models\PayMethod\Paymethod;
use Illuminate\Http\Request;

class PayMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payMethods = Paymethod::all();
        return response()->json([
            'status'=>true,
            'message'=>'Payment Method List',
            'data'=>$payMethods
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
            'name'=>'required|unique:paymethods'
         ]);

         $newPaymentMethod = Paymethod::create($request->all());

         return response()->json([
            'status'=>true,
            'message'=>'You have added a Payment Method Successfully',
            'data'=>$newPaymentMethod
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
        if(PayMethod::where('id',$id)->exists())
        {
            $paymentMethod = PayMethod::where('id',$id)->get();
            return response()->json([
                'status'=>true,
                'message'=>'Payment Method Details',
                'data'=>$paymentMethod
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Payment Method Not Found'
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
        if(PayMethod::where('id',$id)->exists())
        {
            $paymentMethod = PayMethod::where('id',$id)->first();
            $paymentMethod->name = !empty($paymentMethod->name) ? $request->name : $paymentMethod->name;
            $paymentMethod->save();
            return response()->json([
                'status'=>true,
                'message'=>'Payment Method Updated',
                'data'=>$paymentMethod
            ]);
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Payment Method Not Found'
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
        if(PayMethod::where('id',$id)->exists())
        {
            $paymentMethod = PayMethod::where('id',$id)->first();
            $paymentMethod->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Payment has been deleted successfully',
                'data'=>$paymentMethod
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Payment Method Not Found'
            ]);
        }
    }
}
