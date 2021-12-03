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
use DB;

class UserController extends Controller
{
	public function UserManage(){
		if(session()->has('id')){
			$User = DB::table('tbl_user')
			->where('tbl_user.active',1)->get();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="User Manage";
			return view('pages.user-manage',['User'=>$User,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]); 
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}

	}

	public function UserAdd(){
		if(session()->has('id')){
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="User Add";
			return view('pages.user-add',['AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]); 
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
		
	}

	public function UserEdit($id){
		if(session()->has('id')){
			$UserDetail =  DB::table('tbl_user')->where('tbl_user.id',$id)->first();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="User Edit";
			return view('pages.user-edit',['UserDetail'=>$UserDetail,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]); 
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
		
	}
	public function UserAddPost(Request $request){
		$page = $request->input('page');
		$passport = $request->input('passport');
		$name = $request->input('name');
		$address = $request->input('address');
		$phone = $request->input('phone');

		$image = $request->file('image');
		$addTblUser = new tbl_user;
		$addTblUser->passport = $passport;
		$addTblUser->name = $name;
		$addTblUser->address = $address;
		if($image == null){
			$addTblUser->image = 'avatarDefault.jpg';
		}else{
			$new_name = rand() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path('images/avatars'), $new_name);
			$addTblUser->image = $new_name;
		}
		$addTblUser->phone = $phone;
		$addTblUser->created_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblUser->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblUser->save();

		if($page==1){

			return back();
		}else if($page==2){
			return redirect('/user-manage');
		}
		
	}

	public function UserDeletePost(Request $request){
		$id = $request->input('id');
		$user=tbl_user::find($id)->delete();
		echo $id;
	}


	public function UserEditPost(Request $request){
		$id = $request->input('id');
		$UserEdit = tbl_user::where('id',$id)->first();
		$UserEdit->passport = $request->input('passport');
		$UserEdit->name = $request->input('name');
		$UserEdit->address = $request->input('address');
		$UserEdit->phone = $request->input('phone');

		$image = $request->file('image');
		if($image != null){
			$new_name = rand() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path('images/avatars'), $new_name);
			$UserEdit->image = $new_name;
		}
		$UserEdit->save();
		return redirect('/user-manage');
	}


	public function UserSearch(Request $request){
		$inputSearch =  $request['inputSearch'];
		$keyResult = DB::table('tbl_user')
		->Where('tbl_user.passport', 'LIKE', '%' . $inputSearch . '%')
		->orWhere('tbl_user.name', 'LIKE', '%' . $inputSearch . '%')
		->skip(0)->take(10)
		->get();
		return response()->json($keyResult);
	}
}
