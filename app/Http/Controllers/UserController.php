<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;;

class UserController extends Controller
{

   public function show($id){
   	  $user = User::findOrFail($id);
   	  return view('user.show',compact(['user']));
   }

   public function create(){
   		return view('user.create');
   }

   // FOR API
   public function view($id){
   	 $user = User::find($id)->with('meta')->get();
   	 if($user){
   	 	return response()->json([
   	 		'data'=>$user,
   	 		'message'=>'success',
   	 	]);
   	 }
   	 	return response()->json([
   	 		'message'=>'Not Found'
   	 	]);

   }

   public function all(){   	
   	return User::orderByDesc('id')->with('meta')->get();
   }

   public function register(Request $request){ 
   	
   	$fields = [
        'username'=>'required|unique:users,name',
        'password'=>'required',
        'email'=>'required|unique:users,email',        
        'password'=>'required',
        'cpassword'=>'required|same:password',                      
        'status'=>'required',                      
        'position'=>'required',                      
      ];

      $validate = Validator::make($request->all(), $fields);     

      if ($validate->fails()) {              
            return response()->json(['message'=>'failed','data'=>$validate->errors()->first()]);
       }   

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
        		'position'=>($request->position?$request->position:'active'),        		
        		'status'=>($request->status?$request->status:'staff'),        		
        	]);
          DB::commit();
          return response()->json([
          	'message'=>'User Success created',
          ]);
        }
      } catch (\Exception $e) {        
        DB::rollback();        
        return response()->json([
          	'message'=>'failed',
          	'data'=>'User failed created.Please Try Again!'
          ]);
      }
   }

   public function change($id,Request $request){
   	
   	$user = User::find($id);
   	if($user){
   		$fields = [                
        'email'=>'required',                
        'cpassword'=>'required_with:password|same:password',
        'status'=>'required',                      
        'position'=>'required',                      
      ];
     $validate = Validator::make($request->all(), $fields);     

      if ($validate->fails()) {              
            return response()->json(['message'=>'failed','data'=>$validate->errors()->first()]);
       }   

   		if($request->password){
        $user->update([          
          'password'=>Hash::make($request->password)
        ]);
    	}
        $update = $user->update([          
          'email'=>$request->email,          
        ]);

        UserMeta::where('user_id',$user->id)->update([
        	'position'=>($request->position?$request->position:'active'),        		
        	'status'=>($request->status?$request->status:'staff'),  
        ]);
        return response()->json([
          	'message'=>'User Success updated'
          ]);
   	}else{
   		return response()->json([
   	 		'message'=>'failed',
   	 		'data'=>'User cannot be update.Ask Your Principle for Detail'
   	 	]);	   	
   	}
   	
   }

   public function delete($id){
   		$user = User::find($id);
   		if($user){
   			$user->delete();
   			return response()->json([
   	 		'message'=>'User has been deleted'
   	 	]);
   		}
   			return response()->json([
   	 		'message'=>'failed',
   	 		'data'=>'User cannot be delete.Ask Your Principle for Detail'
   	 	]);	   	
   	   
   }
}
