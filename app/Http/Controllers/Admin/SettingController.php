<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
	public function setting(){
		 
        $settings=DB::table('settings')->where('id',1)->first();
        return view('admin.setting.edit',compact('settings'));
	}

	public function updatesetting(Request $request,$id){

		$data=array();
        $data['shopname']=$request->shopname;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['phone_optional']=$request->phone_optional;
        $data['address']=$request->address;
        $data['vat']=$request->vat;
        $data['shipping_charge']=$request->shipping_charge;
        $image=$request->file('logo');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='media/category/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['logo']=$image_url;
                $done=DB::table('settings')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'settings Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('setting')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'settings Update Unuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }                    
            }else{
              
               $done=DB::table('settings')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'settings Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('setting')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'settings Update Unuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
            }

	}
    
}
