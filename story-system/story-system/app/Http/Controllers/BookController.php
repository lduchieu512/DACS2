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

class BookController extends Controller
{
	public function Index(){
		if(session()->has('id')){
			$Book = DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental')
			->where('tbl_book.quanlity', '>' ,0)
			->where('tbl_book.active',1)->orderBy('tbl_book.id', 'desc')->get();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="Book";
			return view('pages.book',['Book'=>$Book,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]);
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		} 
	}

	public function SearchBook(Request $request){
		$inputSearch =  $request['inputSearch'];
		$keyResult = DB::table('tbl_book')
		->join('tbl_category','tbl_category.id','=','tbl_book.category')
		->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental')
		->where('tbl_book.quanlity', '>' ,0)
		->Where('tbl_book.name', 'LIKE', '%' . $inputSearch . '%')
		->get();
		return response()->json($keyResult);
	}



	public function BookAdd(){
		if(session()->has('id')){
			$Category = DB::table('tbl_category')->get();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="Book Add";
			return view('pages.book-add',['Category'=>$Category,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]);
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}

	}

	public function BookAddPost(Request $request){
		$name = $request->input('name');
		$price = $request->input('price');
		$category = $request['category'];
		$quanlity = $request->input('quanlity');
		$note = $request->input('note');
		$image = $request->file('image');
		$new_name = rand() . '.' . $image->getClientOriginalExtension();
		$image->move(public_path('images/books'), $new_name);

		$addTblBook = new tbl_book;
		$addTblBook->name = $name;
		$addTblBook->price = $price;
		$addTblBook->category = $category;
		$addTblBook->quanlity = $quanlity;
		$addTblBook->note = $note;
		$addTblBook->image = $new_name;
		$addTblBook->created_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblBook->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblBook->save();
		return redirect('/book');
	}

	public function BookDetail($id){
		if(session()->has('id')){
			$BookDetail =  DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental','tbl_book.image','tbl_book.note','tbl_book.created_at','tbl_book.price')
			->where('tbl_book.id',$id)->first();

			$UserRentalList = DB::table('tbl_rental')
			->join('tbl_user','tbl_user.id','=','tbl_rental.iduser')
			->join('tbl_book','tbl_book.id','=','tbl_rental.idbook')
			->select('tbl_rental.id','tbl_rental.from_date','tbl_rental.to_date','tbl_user.name as nameuser','tbl_user.passport','tbl_user.phone','tbl_user.address')
			->where('tbl_book.id',$id)
			->orderBy('tbl_rental.id', 'desc')
			->skip(0)->take(20)
			->get();

			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title=$BookDetail->name;
			return view('pages.book-detail',['UserRentalList'=>$UserRentalList,'BookDetail'=>$BookDetail,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]); 
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
		
	}


	public function BookDelete($id){
		$user=tbl_book::find($id)->delete();
		return redirect('/book');
	}


	public function BookEdit($id){
		if(session()->has('id')){
			$BookDetail =  DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental','tbl_book.image','tbl_book.note','tbl_book.created_at','tbl_book.price','tbl_category.id as idcategory')
			->where('tbl_book.id',$id)->first();

			$Category = DB::table('tbl_category')->get();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="Edit Book";
			return view('pages.book-edit',['BookDetail'=>$BookDetail,'Category'=>$Category,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]);
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}

	}


	public function BookEditPost(Request $request){
		$id = $request->input('id');
		$BookEdit = tbl_book::where('id',$id)->first();
		$BookEdit->name = $request->input('name');
		$BookEdit->price = $request->input('price');
		$BookEdit->category = $request['category'];
		$BookEdit->quanlity = $request->input('quanlity');
		$BookEdit->note = $request->input('note');


		$image = $request->file('image');
		if($image != null){
			$new_name = rand() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path('images/books'), $new_name);
			$BookEdit->image = $new_name;
		}
		$BookEdit->save();
		return redirect('/book');
	}


	public function BookRental($id){
		if(session()->has('id')){
			$BookDetail =  DB::table('tbl_book')
			->join('tbl_category','tbl_category.id','=','tbl_book.category')
			->select('tbl_book.id','tbl_book.name','tbl_category.name as namecategory','tbl_book.quanlity','tbl_book.image','tbl_book.total_rental','tbl_book.image','tbl_book.note','tbl_book.created_at','tbl_book.price')
			->where('tbl_book.id',$id)->first();

			$UserList =DB::table('tbl_user')->skip(0)->take(10)->orderBy('tbl_user.id', 'desc')->get();
			$AdminInfo =  DB::table('tbl_admin')->where('tbl_admin.id',1)->first();
			$TotalBook = DB::table('tbl_book')->where('tbl_book.active',1)->count();
			$TotalUser = DB::table('tbl_user')->where('tbl_user.active',1)->count();

			$TotalRental = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_rental')->first();
			$TotalReturn = 	DB::table('tbl_analytic')->where('tbl_analytic.name','total_return')->first();
			$TotalRentaling = DB::table('tbl_rental')->where('tbl_rental.active','1')->count();
			$TotalOutOfDate = DB::table('tbl_rental')->where('tbl_rental.to_date','<',Carbon::now())->count();
			$title="Rental Book";
			return view('pages.book-rental',['UserList'=>$UserList,'BookDetail'=>$BookDetail,'AdminInfo'=>$AdminInfo,'TotalBook'=>$TotalBook,'TotalUser'=>$TotalUser,'TotalRental'=>$TotalRental,'TotalReturn'=>$TotalReturn,'TotalRentaling'=>$TotalRentaling,'TotalOutOfDate'=>$TotalOutOfDate,'title'=>$title]);
		}else{
			$title="Login";
			return view('pages.admin-login',['title'=>$title]);
		}
		
	}

	public function BookRentalPost(Request $request){
		$addTblRental = new tbl_rental;
		$addTblRental->idbook = $request->input('idbook');
		$addTblRental->iduser = $request->input('iduser');
		$addTblRental->from_date = $request->input('from_date');
		$addTblRental->to_date = $request->input('to_date');
		$addTblRental->note = $request->input('note');
		$addTblRental->idadmin = session('id');
		$addTblRental->created_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblRental->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
		$addTblRental->save();


		$UpdateAnalytic = tbl_analytic::where('tbl_analytic.name','total_rental')->first();
		$UpdateAnalyticNow = $UpdateAnalytic->value;
		$UpdateAnalytic->value = $UpdateAnalyticNow +1;
		$UpdateAnalytic->save();


		$idbook = $request->input('idbook');

		$UpdateRentalBook = tbl_book::where('id',$idbook)->first();
		$RentalBookNow = $UpdateRentalBook->total_rental;
		$UpdateRentalBook->total_rental = $RentalBookNow +1;
		$UpdateRentalBook->save();


		$UpdateQuanlityBook = tbl_book::where('id',$idbook)->first();
		$QuanlityBookNow = $UpdateQuanlityBook->quanlity;
		$UpdateQuanlityBook->quanlity = $QuanlityBookNow -1;
		$UpdateQuanlityBook->save();
		return redirect('/rental-manage/rentaling');
	}
	
}
