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

class RentalController extends Controller
{
	public function Index($type){
		if(session()->has('id')){
			if($type =='all'){
				$RentalList = 	DB::table('tbl_rental')
				->join('tbl_user','tbl_user.id','=','tbl_rental.iduser')
				->join('tbl_book','tbl_book.id','=','tbl_rental.idbook')
				->join('tbl_admin','tbl_admin.id','=','tbl_rental.idadmin')
				->select('tbl_rental.id','tbl_rental.active','tbl_rental.note','tbl_rental.from_date','tbl_rental.to_date','tbl_user.name as nameuser','tbl_user.passport','tbl_user.phone','tbl_user.address','tbl_book.name as namebook','tbl_book.image','tbl_admin.username','tbl_book.id as idbook')
				->orderBy('tbl_rental.id', 'desc')
				->skip(0)->take(20)
				->get();
				$title="All Rental";
			}elseif ($type == 'rentaling') {
				$RentalList = 	DB::table('tbl_rental')
				->join('tbl_user','tbl_user.id','=','tbl_rental.iduser')
				->join('tbl_book','tbl_book.id','=','tbl_rental.idbook')
				->join('tbl_admin','tbl_admin.id','=','tbl_rental.idadmin')
				->select('tbl_rental.id','tbl_rental.active','tbl_rental.note','tbl_rental.from_date','tbl_rental.to_date','tbl_user.name as nameuser','tbl_user.passport','tbl_user.phone','tbl_user.address','tbl_book.name as namebook','tbl_book.image','tbl_admin.username','tbl_book.id as idbook')
				->where('tbl_rental.active',1)
				->orderBy('tbl_rental.id', 'desc')
				->skip(0)->take(20)
				->get();
				$title="Rentaling";
			}elseif ($type == 'outdate') {
				$RentalList = 	DB::table('tbl_rental')
				->join('tbl_user','tbl_user.id','=','tbl_rental.iduser')
				->join('tbl_book','tbl_book.id','=','tbl_rental.idbook')
				->join('tbl_admin','tbl_admin.id','=','tbl_rental.idadmin')
				->select('tbl_rental.id','tbl_rental.active','tbl_rental.note','tbl_rental.from_date','tbl_rental.to_date','tbl_user.name as nameuser','tbl_user.passport','tbl_user.phone','tbl_user.address','tbl_book.name as namebook','tbl_book.image','tbl_admin.username','tbl_book.id as idbook')
				->where('tbl_rental.to_date','<',Carbon::now())
				->orderBy('tbl_rental.id', 'desc')
				->skip(0)->take(20)
				->get();
				$title="Out Date";
			}



			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();
			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();

			return view('pages.rental-manage',['RentalList'=>$RentalList,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]); 
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
		
	}


	public function BookReturn(Request $request){
		$id = $request->input('id');
		$BookReturn = tbl_rental::where('id',$id)->first();
		$BookReturn->active = '0';
		$BookReturn->save();

		$idbook = $request->input('idbook');
		$UpdateQuanlityBook = tbl_book::where('id',$idbook)->first();
		$QuanlityBookNow = $UpdateQuanlityBook->quanlity;
		$UpdateQuanlityBook->quanlity = $QuanlityBookNow +1;
		$UpdateQuanlityBook->save();
		echo $id;
	}

	public function BookRenewal(Request $request){
		$id = $request->input('id');
		$date = $request->input('date');
		$BookReturn = tbl_rental::where('id',$id)->first();
		$BookReturn->to_date = $date;
		$BookReturn->save();
		echo $id;
	}


	public function RentalSearch(Request $request){
		$inputSearch =  $request['inputSearch'];
		$keyResult = DB::table('tbl_rental')
		->join('tbl_user','tbl_user.id','=','tbl_rental.iduser')
		->join('tbl_book','tbl_book.id','=','tbl_rental.idbook')
		->select('tbl_rental.id','tbl_rental.active','tbl_rental.note','tbl_rental.from_date','tbl_rental.to_date','tbl_user.name as nameuser','tbl_user.passport','tbl_user.phone','tbl_user.address','tbl_book.name as namebook','tbl_book.image','tbl_book.id as idbook')
		->Where('tbl_user.passport', 'LIKE', '%' . $inputSearch . '%')
		->orWhere('tbl_user.name', 'LIKE', '%' . $inputSearch . '%')
		->orWhere('tbl_user.phone', 'LIKE', '%' . $inputSearch . '%')
		->orWhere('tbl_book.name', 'LIKE', '%' . $inputSearch . '%')
		->orderBy('tbl_rental.id', 'desc')
		->skip(0)->take(10)
		->get();
		return response()->json($keyResult);
	}
}
