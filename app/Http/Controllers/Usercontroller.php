<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function userregister(Request $request){

        $admin = User::create([
         
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)
        ]);
    
    
          if($admin){
            return response()->json([$admin,'status' => true]);
    
          }else {
            return response()->json(['status' => false]);
    
          }
     }
    
    
          public function userlog(Request $request){
    
            $credentials = request(['email', 'password']);
    
            if (! $token = auth()->guard('user-api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            return $token;
            }
            public function me()
            {
                return response()->json(auth()->guard('user-api')->user());
            }
        
            /**
             * Log the user out (Invalidate the token).
             *
             * @return \Illuminate\Http\JsonResponse
             */
            public function userlogout()
            {
                auth()->guard('user-api')->logout();
        
                return response()->json(['message' => 'Successfully logged out']);
            }
}
