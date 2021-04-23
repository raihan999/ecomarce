<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class BrandController extends Controller
{
     public function index(){
         $brand=DB::table('brand')->get();
         return view('admin.brand.create',compact('brand'));
     }

     public function store(Request $request){
        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('brand_logo');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/media/brand/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['brand_logo']=$image_url;
                $brand=DB::table('brand')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Brand Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $brand=DB::table('brand')
                          ->insert($data);
                 $notification=array(
                     'messege'=>'Done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }
     }

     public function delete($id){
        $data=DB::table('brand')->where('id',$id)->first();
        $image=$data->brand_logo;
        unlink($image);
        $brand=DB::table('brand')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Brand Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);
     }
}
