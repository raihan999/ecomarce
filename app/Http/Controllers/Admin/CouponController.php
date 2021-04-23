<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CouponController extends Controller
{
    public function index(){
        $coupon =DB::table('coupon')->get();
        return view('admin.coupon.create',compact('coupon'));
    }

    public function store(Request $request){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $done =DB::table('coupon')->insert($data);
        if ($done) {
            $notification = array(
                'message' => 'coupon Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'coupon Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }


    }

    // newslater coontroller here

    public function newslater(){
        $newslater =DB::table('newslater')->get();
        return view('admin.newslater.create',compact('newslater'));
    }

    public function deletenewslater($id){
        
        $done=DB::table('newslater')->where('id',$id)->delete();
        if ($done) {
            $notification = array(
                'message' => 'newslater Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'newslater Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }


    }
}
