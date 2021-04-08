<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct(){
    	$this->middleware('guest')->except('logout');
    }
    public function index(){
    	return view('auth.login');
    }

    public function store(Request $request){
    	$validate = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'            
        ]);
        
        if ($validate->fails()) {                 	
            return back()->withErrors($validate)->withInput();
        }else{    
        	$credentials = $request->only('name', 'password');        
            if (Auth::attempt($credentials)) {                        
            $request->session()->regenerate();
            Auth::user()->generateToken();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
        }

    }

    public function login(Request $request){

    	 $validate = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'            
        ]);
        
        if ($validate->fails()) {              
            return response()->json(['message'=>'failed','data'=>$validate->errors()->first()]);
       }else{    
        	$credentials = $request->only('name', 'password');        
            if (Auth::attempt($credentials)) {
            if(Auth::user()->api_token){
            	return response()->json([
            	'data'=>'Your has been logged in',
            	'message'=>'failed',
            ]);
            }                                    
            Auth::user()->generateToken();
            return response()->json([
            	'data'=>Auth::user(),
            	'message'=>'success'
            ]);
        }

        return response()->json([
            	'message'=>'failed',
            	'data'=>'Login Failed'
            ]);
        }

    }

    public function logout(){
    	Auth::user()->degenerateToken();
    	Auth::logout();

    	return redirect('login');
    }	
}
