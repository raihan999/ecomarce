<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function index(){
        return view('user.index');
 /*       $cats=DB::table('category')->skip(3)->first();
$category_id=$cats->id;
$products_cat=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();
dd($products_cat);*/
    }
}
