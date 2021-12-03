<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_book;
use App\Models\tbl_admin;
use App\Models\tbl_user;
use App\Models\tbl_rental;
use App\Models\tbl_analytic;
use App\Models\tbl_category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
	public function Index(){
		if(session()->has('id')){
			return redirect('/');
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
	}

	public function Login(Request $request){
		$username =  $request['username'];
		$password =  $request['password'];
		if(Auth::attempt(['username'=>$username,'password'=>$password])){
			$userinfo = tbl_admin::where('username',$username)->first();
			session(['id' => $userinfo->id]);
			session(['avatar' => $userinfo->avatar]);
			session(['username' => $userinfo->username]);
			session(['role' => $userinfo->role]);
			echo "1";
		}else{   
			echo "2";
		}
	}
	public function Logout(Request $request){
		$request->session()->flush();
		return redirect('admin-login');
	}
}
