<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
    	$users = User::orderByDesc('id')->paginate(100);    	
    	return view('dashboard.index',compact(['users']));
    }
}
