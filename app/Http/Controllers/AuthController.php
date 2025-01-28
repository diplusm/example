<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function logina(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($data)) {
            if($request->expectsJson()){
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        if($request->expectsJson()){
            $user = Auth::user();
    
            $token = $user->createToken('auth-token')->plainTextToken;

            
            return response()->json([
                'status' => 'Success',
                'token' => $token,
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/analytics');
        

    }

    public static function logout(Request $request){
        if($request->expectsJson()){
            $request->user()->currentAccessToken()->delete();
        }else{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        if($request->expectsJson()){
            return response()->json([
                'status' => 'Success',
            ]);
        }else{
            return redirect('/auth');
        }
        
        
    }
}
