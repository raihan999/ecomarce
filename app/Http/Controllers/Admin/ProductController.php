<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    public function index(){
        $category=DB::table('category')->get();
        $subcategory=DB::table('subcategory')->get();
        $brand=DB::table('brand')->get();
        return view('admin.product.create',compact('category','brand','subcategory'));
    }

    public function getsubcategory($category_id){
        $cat = DB::table("subcategory")->where("category_id",$category_id)->get();
        return json_encode($cat);
        dd($cat);
        //echo "Done";
    }


   


   
        
       
    public function store(Request $request)
    {
        $data=array();
    	$data['product_name']=$request->product_name;
    	$data['product_code']=$request->product_code;
    	$data['product_quantity']=$request->product_quantity;
    	$data['category_id']=$request->category_id;
    	$data['subcategory_id']=$request->subcategory_id;
    	$data['brand_id']=$request->brand_id;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['selling_price']=$request->selling_price;
    	$data['ex_tax']=$request->ex_tax;
    	$data['product_details']=$request->product_details;
    	$data['video_link']=$request->video_link;
    	$data['featured_product']=$request->featured_product;
    	$data['new_product']=$request->new_product;
        $data['buyone_getone']=$request->buyone_getone;
    	$data['status']=1;

    	$image_one=$request->image_one;
    	$image_two=$request->image_two;
    	$image_three=$request->image_three;
    	$image_four=$request->image_four;

    if($image_one && $image_two && $image_three && $image_four){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('media/product/'.$image_one_name);
                $data['image_one']='media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('media/product/'.$image_two_name);
                $data['image_two']='media/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('media/product/'.$image_three_name);
                $data['image_three']='media/product/'.$image_three_name; 

            $image_four_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                Image::make($image_four)->resize(230,300)->save('media/product/'.$image_three_name);
                $data['image_four']='media/product/'.$image_four_name; 
                
                $product=DB::table('products')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification); 
        }
   
    }
}
