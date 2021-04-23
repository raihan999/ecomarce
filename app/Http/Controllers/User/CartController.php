<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
use Session;
class CartController extends Controller
{
    public function AddCart($id)
    {
    	  $product=DB::table('products')->where('id',$id)->first();
    	  $data=array();
    	  if ($product->discount_price == NULL) {
    	  	            $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->selling_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;
                        $data['options']['color']='';
                        $data['options']['size']='';
    	               Cart::add($data);
    	               return response()->json(['success' => 'Successfully Added on your Cart']);
    	   }else{
    	               $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->discount_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;  
                        $data['options']['color']='';
                        $data['options']['size']=''; 
    	             
    	                Cart::add($data);  
    	              return response()->json(['success' => 'Successfully Added on your Cart']);   
    	 }
    }

    public function showCart(){
    	 $cart=Cart::content();
       return view('user.cart',compact('cart'));
    }

    public function removeCart($rowId)
    {
        $done=Cart::remove($rowId);
        if ($done) {
            $notification = array(
                'message' => 'Cart Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cart Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

     public function UpdateCart(Request $request)
    {
        $rowId =$request->productid;
        $qty=$request->qty;
        $done=Cart::update($rowId, $qty);
        if ($done) {
            $notification = array(
                'message' => 'Cart Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cart Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function Checkout()
    {
        if (Auth::check()) {
              $cart=Cart::content();
              return view('user.checkout',compact('cart'));
        }else{
	           $notification = array(
	                'message' => 'AT first login your account',
	                'alert-type' => 'warning'
	            );
	            return redirect()->route('login')->with($notification);
        }


    }

    public function Wishlist()
    {
        $userid=Auth::id();
        $product=DB::table('wishlist')->join('products','wishlist.product_id','products.id')
                          ->select('products.*','wishlist.user_id')
                          ->where('wishlist.user_id',$userid)
                          ->get();
           return view('user.wishlist',compact('product'));             
    }

    public function Coupon(Request $request)
    {
        $coupon=$request->coupon;
        $check=DB::table('coupon')->where('coupon',$coupon)->first();
        if ($check) {
        	$newSubtotal = (Cart::subtotal());

              session::put('coupon',[
                  'name' => $check->coupon,
                  'discount' => $check->discount,
                  'balance' => $newSubtotal
              ]);
              $notification = array(
	                'message' => 'Successfully Coupon applyed.',
	                'alert-type' => 'success'
	            );
	            return redirect()->back()->with($notification);
        }else{
        	$notification = array(
	                'message' => 'Invalid Coupon',
	                'alert-type' => 'warning'
	            );
	            return redirect()->back()->with($notification);
           
        }

    }

    public function CouponRemove()
    {
         session::forget('coupon');
          return redirect()->back();
    }
}
