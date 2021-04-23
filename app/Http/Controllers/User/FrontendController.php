<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Cart;
class FrontendController extends Controller
{
    public function register(){
    	return view('user.register');
    }

    public function profile(){
    	return view('user.profile');
    }

    public function Logout()
    {
        // $logout= Auth::logout();
            Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->to('/')->with($notification);
       

    }

    public function ProductView($id,$product_name)
    {
        $product=DB::table('products')
        ->join('category','products.category_id','category.id')
        ->join('subcategory','products.subcategory_id','subcategory.id')
        ->join('brand','products.brand_id','brand.id')
        ->select('products.*','category.categoty_name','subcategory.subcategory_name','brand.brand_name')->where('products.id',$id)->first();

        $color=$product->product_color;
        $product_color = explode(',', $color);

        $size=$product->product_size;
        $product_size = explode(',', $size);
      return  view('user.product_details',compact('product','product_color','product_size'));
    }


 public function AddCart(Request $request,$id)
    {
         $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->discount_price == NULL) {
                        $data['id']=$id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->selling_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                        $done =Cart::add($data);
                        //dd($data);
                        if ($done) {
                            $notification = array(
                                'message' => 'Cart Added Successfully.',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                                'message' => 'Cart Added Unuccessfully',
                                'alert-type' => 'danger'
                            );
                            return redirect()->back()->with($notification);
                        }
                        
           }else{
                         $data['id']=$id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->discount_price;
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                         $done =Cart::add($data);
                         //dd($data);
                        if ($done) {
                            $notification = array(
                                'message' => 'Cart Added Successfully.',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                                'message' => 'Cart Added Unuccessfully',
                                'alert-type' => 'danger'
                            );
                            return redirect()->back()->with($notification);
                        }
         }
    }

    public function quickview($id,$product_name){
        
        $product=DB::table('products')
        ->join('category','products.category_id','category.id')
        ->join('subcategory','products.subcategory_id','subcategory.id')
        ->join('brand','products.brand_id','brand.id')
        ->select('products.*','category.categoty_name','subcategory.subcategory_name','brand.brand_name')->where('products.id',$id)->first();

        $color=$product->product_color;
        $product_color = explode(',', $color);

        $size=$product->product_size;
        $product_size = explode(',', $size);
      return  view('user.quickview',compact('product','product_color','product_size'));
    }

    public function productsView($id)
    {
         $products=DB::table('products')->where('subcategory_id',$id)->paginate(9);
         $brands= DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();
         
         return view('user.all_products',compact('products','brands'));
         //dd($products);
    }

    
}
