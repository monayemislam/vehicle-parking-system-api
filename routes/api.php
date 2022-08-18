<?php

use App\Http\Controllers\AvailableSpace\AvailableSpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vehicle\VehicleTypeController;
use App\Http\Controllers\Space\SpaceTypeController;
use App\Http\Controllers\PayMethod\PayMethodController;
use App\Models\AvailableSpace\AvailableSpace;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Restricted Routes-Admin
Route::group(['middleware'=>['auth:sanctum','isAdmin']],function(){

    Route::post('/logout',[UserController::class,'logout']);

    //vehicle Type
    Route::get('/vehicle-type',[VehicleTypeController::class,'index']);
    Route::get('/vehicle-type/{id}',[VehicleTypeController::class,'show']);
    Route::delete('/delete-vehicle-type/{id}',[VehicleTypeController::class,'destroy']);
    Route::post('/create-vehicle-type',[VehicleTypeController::class,'store']);
    Route::put('/update-vehicle-type/{id}',[VehicleTypeController::class,'update']);

    //Space Type 
    Route::get('/spaceType',[SpaceTypeController::class,'index']);
    Route::post('/create-space-type',[SpaceTypeController::class,'store']);
    Route::get('/show-space-type/{id}',[SpaceTypeController::class,'show']);
    Route::delete('/delete-space-type/{id}',[SpaceTypeController::class,'destroy']);
    Route::put('/update-space-type/{id}',[SpaceTypeController::class,'update']);

    //Payment Method
    Route::get('/payment-method',[PayMethodController::class,'index']);
    Route::get('/payment-method/{id}',[PayMethodController::class,'show']);
    Route::post('/create-payment-method',[PayMethodController::class,'store']);
    Route::delete('/delete-payment-mehtod/{id}',[PayMethodController::class,'destroy']);
    Route::put('/update-payment-method/{id}',[PayMethodController::class,'update']);

});

//Athenticated User's routes
Route::group(['middleware'=>['auth:sanctum']],function(){

    //User's Available Spaces for rent
    Route::get('/get-available-space',[AvailableSpaceController::class,'index']);
    Route::post('/create-available-space',[AvailableSpaceController::class,'store']);
    Route::get('/show-available-space/{id}',[AvailableSpaceController::class,'show']);
    Route::delete('/delete-available-space/{id}',[AvailableSpaceController::class,'destroy']);
    Route::put('/update-available-space/{id}',[AvailableSpaceController::class,'update']);
    
});


//Open Routes
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);


 

 
