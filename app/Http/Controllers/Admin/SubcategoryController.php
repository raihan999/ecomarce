<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubcategoryController extends Controller
{
    public function index(){
        $category=DB::table('category')->get();
        $subcategory=DB::table('subcategory')
        ->join('category','subcategory.category_id','category.id')
        ->select('subcategory.*','category.categoty_name')
        ->get();
        return view('admin.subcategory.create',compact('category','subcategory'));

    }

    public function store(Request $request){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $done=DB::table('subcategory')->insert($data);
        if ($done) {
            $notification = array(
                'message' => 'Subcategory Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Subcategory Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }


    }


}
