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

class HomeController extends Controller
{
	public function Index(){
		if(session()->has('id')){
			$BookNew = DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental')
			->where('tbl_book.quanlity', '>' ,0)
			->where('tbl_book.active',1)->orderBy('tbl_book.id', 'desc')->skip(0)->take(20)->get();

			$BookRental = DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental')
			->where('tbl_book.quanlity', '>' ,0)
			->where('tbl_book.active',1)->orderBy('tbl_book.total_rental', 'desc')->skip(0)->take(20)->get();
			
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="Home";
			return view('pages.home',['BookNew'=>$BookNew,'BookRental'=>$BookRental,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]);
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		} 
	}
}
