<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Hash;
use DB;

class RegisterController extends Controller
{
    public function index(){
    	return view('auth.register');
    }

    public function store(Request $request){      

      $fields = [
        'username'=>'required|unique:users,name',
        'password'=>'required',
        'email'=>'required',        
        'password'=>'required',
        'cpassword'=>'required|same:password',                      
        'status'=>'required',                      
        'position'=>'required',                      
      ];
      
      $request->validate($fields);     

      try {
        DB::beginTransaction();
        $users = User::create([          
          'name'=>$request->username,
          'email'=>$request->email,
          'password'=>Hash::make($request->password),          
        ]);

        if($users){
        	UserMeta::create([
        		'user_id'=>$users->id,
        		'position'=>$request->position,        		
        		'status'=>$request->status,        		
        	]);
          DB::commit();
          return redirect('login')->with(['success'=>'User was successfull registered.Login Now']);
        }
      } catch (\Exception $e) {        
        DB::rollback();        
        return back()->withInput()->withErrors('Terjadi kesalahan Sistem, Coba lagi.');
      }
    }
}
