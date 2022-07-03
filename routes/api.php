<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vehicle\VehicleTypeController;
use App\Http\Controllers\Space\SpaceTypeController;

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

//Restricted Routes
Route::group(['middleware'=>['auth:sanctum','isAdmin']],function(){
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/vehicleType',[VehicleTypeController::class,'index']);

    //Space Type 
    Route::get('/spaceType',[SpaceTypeController::class,'index']);
    Route::post('/create-space-type',[SpaceTypeController::class,'store']);
    Route::get('/show-space-type/{id}',[SpaceTypeController::class,'show']);
    Route::delete('/delete-space-type/{id}',[SpaceTypeController::class,'destroy']);
    Route::put('/update-space-type/{id}',[SpaceTypeController::class,'update']);
});
//Open Routes
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
 

 
