<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
    	 
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
     	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	 return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customers(Redirect $request){

    	$data = array();
    	$data['customers_name'] = $request->customers_name;
    	$data['customers_phone'] = $request->customers_phone;
    	$data['customer_email'] = $request->customesr_email;
    	$data['customers_password'] = $request->customers_password;

    	$customers_id = DB::table('tbl_customers')->insertGetId($data);

    	session::put('customers_id',$customers_id);
    	session::put('customers_name',$request->customers_name); 
    	return Redirect('/checkout'); 

    }
    public function checkout(){

    }
}
