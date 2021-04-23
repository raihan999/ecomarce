<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class NewslaterController extends Controller
{
    public function storenewslater(Request $request){
        $data=array();
        $data['email']=$request->email;
        $done =DB::table('newslater')->insert($data);
        if ($done) {
            $notification=array(
                'messege'=>'Thanks for subscribing ',
                'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Thanks for Unsubscribing ',
                'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
        }
    }
}
