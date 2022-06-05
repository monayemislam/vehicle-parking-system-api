<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   //User Login
   public function login(Request $request)
   {
      $request->validate([
         'email' => 'required|string|email',
         'password' => 'required',
      ]);

      $user = User::where('email', $request->email)->first();

      if (!$user || !Hash::check($request->password, $user->password)) {

         $response = [
            'status'=>false,
            'message'=>'Invalid Credentials!',
        ];
         return response($response,401);
      }

      $generateToken = $user->createToken('user_token')->plainTextToken;

      $response = [
         'status'=>true,
         'message'=>'Logged in Successfully',
         'data'=>[
            'user'=>$user,
            'accessToken'=>$generateToken
         ]
     ];
      return response($response,201);
   }

   //User Registration
   public function register(Request $request)
   {
      $registerInfo = $request->validate([
         'name'=>'required|string|max:255',
         'email'=>'required|string|email|unique:users,email',
         'password'=>'required|string'
      ]);

      $user = User::create([
         'name'=>$registerInfo['name'],
         'email'=>$registerInfo['email'],
         'password'=>Hash::make($registerInfo['password'])
      ]);
      
      $generateToken = $user->createToken('user_token')->plainTextToken;

      $response = [
         'status'=>true,
         'message'=>'User Created Successfully',
         'data'=>[
            'user'=>$user,
            'accessToken'=>$generateToken
         ]
     ];
      return response($response,201);
   }

   //User Log Out

   public function logout(Request $request)
   {
      $user= Auth::user();
      $user()->tokens()->delete();
      $response = [
         'status'=>true,
         'message'=>'Logged Out Successfully',
     ];
      return response($response,401);
   }

}
