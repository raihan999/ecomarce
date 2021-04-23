@php  
  $category=DB::table('category')->get();
@endphp
@extends('layouts.user.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
@include('layouts.user.manubar')
	</header>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Smartphone & Tablets</a></li>
		</ul>
		
		<div class="row">
			<!--Left Part Start -->
			<aside class="col-sm-4 col-md-3" id="column-left">
				<div class="module menu-category titleLine">
	<h3 class="modtitle">Categories</h3>
	<div class="modcontent">
		<div class="box-category">
			<ul id="cat_accordion" class="list-group">
				@foreach($category as $cat)
				<li class="hadchild"><a href="category.html" class="cutom-parent">{{$cat->categoty_name}}</a>   <span class="button-view  fa fa-plus-square-o"></span>
					<ul style="display: block;">
						@php  
						$subcategory=DB::table('subcategory')->where('category_id',$cat->id)->get();
					    @endphp
						@foreach($subcategory as $row)
						@if($subcategory!=null)	
					     <li><a href="{{ url('products/'.$row->id) }}">{{$row->subcategory_name}}</a></li>
						@else
						@endif
					    @endforeach
						
					</ul>
				</li>
				@endforeach
				{{-- <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a>  <span class="dcjq-icon"></span></li> --}}		
			</ul>
		</div>
		
		
	</div>
</div>
 <div class="module latest-product titleLine">
   <h3 class="modtitle">Latest Product</h3>
   <div class="modcontent ">
   	@foreach($products as $pros)
		<div class="product-latest-item">
			<div class="media">
			   <div class="media-left">
				  <a href="#"><img src="{{ asset($pros->image_one) }}" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 100px; height: 82px;"></a>
			   </div>
			   <div class="media-body">
				  <div class="caption">
					 <h4><a href="{{ url('product/details/'.$pros->id.'/'.$pros->product_name) }}">{{ $pros->product_name }}</a></h4>
					
					 <div class="price">
						{{-- <span class="price-new">$100.00</span> --}}
						@if($pros->discount_price == NULL)            
                         <span class="price-new" itemprop="price">ট {{ $pros->selling_price }}</span>
                        @else
                        @endif
                        @if($pros->discount_price != NULL)
                         <span class="price-new" itemprop="price">ট {{ $pros->discount_price }}</span>
                         <span class="price-old">ট {{ $pros->selling_price }}</span>
                        @else
                        @endif
					 </div>
					 <div class="ratings">
						<div class="rating-box">
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
					 </div>
				  </div>
				  
			   </div>
			</div>
		</div>
	@endforeach
	
		
	
		
		
   </div>
   
</div>
				<div class="module">
					<div class="modcontent clearfix">
						<div class="banners">
							<div>
								<a href="#"><img src="{{ asset('user/')}}/image/demo/cms/left-image-static.png" alt="left-image"></a>
							</div>
						</div>
						
					</div>
				</div>
			</aside>
			<!--Left Part End -->
			
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="products-category">
					<div class="category-derc">
						<div class="row">
							<div class="col-sm-12">
								<div class="banners">
									<div>
										<a  href="#"><img src="{{ asset('user/')}}/image/demo/shop/category/electronic-cat.png" alt="Apple Cinema 30&quot;"><br></a>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<!-- Filters -->
					<div class="product-filter filters-panel">
						<div class="row">
							<div class="col-md-2 visible-lg">
								<div class="view-mode">
									<div class="list-view">
										<button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
										<button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									</div>
								</div>
							</div>
							<div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
								<div class="form-group short-by">
									<label class="control-label" for="input-sort">Sort By:</label>
									<select id="input-sort" class="form-control"
									onchange="location = this.value;">
										<option value="" selected="selected">Default</option>
										<option value="">Name (A - Z)</option>
										<option value="">Name (Z - A)</option>
										<option value="">Price (Low &gt; High)</option>
										<option value="">Price (High &gt; Low)</option>
										<option value="">Rating (Highest)</option>
										<option value="">Rating (Lowest)</option>
										<option value="">Model (A - Z)</option>
										<option value="">Model (Z - A)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-limit">Show:</label>
									<select id="input-limit" class="form-control" onchange="location = this.value;">
										<option value="" selected="selected">9</option>
										<option value="">25</option>
										<option value="">50</option>
										<option value="">75</option>
										<option value="">100</option>
									</select>
								</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
								{{   $products->links() }}
								{{-- <ul class="pagination">
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li><li><a href="#">&gt;</a></li>
									<li><a href="#">&gt;|</a></li>

								</ul> --}}
							</div>
						</div>
					</div>
					<!-- //end Filters -->
					<!--changed listings-->
					<div class="products-list row grid">
						@foreach($products as $pro)
	<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
		<div class="product-item-container">
			<div class="left-block">
				<div class="product-image-container lazy second_img ">
					<img data-src=" {{ asset($pro->image_one) }} " src="{{ asset($pro->image_one) }}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="{{ asset($pro->image_two) }}" src="{{ asset($pro->image_two) }}"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
				</div>
				<!--Sale Label-->
				{{-- <span class="label label-sale">Sale</span> --}}
				@if($pro->discount_price == NULL)
				<span class="label label-new">New</span>
				@else
				@endif 
				<!--countdown box-->
				<div class="countdown_box">
	<div class="countdown_inner">
		<div class="title">This limited offer ends</div>
		
		<div class="defaultCountdown-30"></div>
	</div>
</div>
				<!--end countdown box-->
				
				<!--full quick view block-->
				<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{ url('product/popup/'.$pro->id.'/'.$pro->product_name) }}">  Quickview</a>
				<!--end full quick view block-->
			</div>
			
			
			<div class="right-block">
				<div class="caption">
				<h4><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}">{{ $pro->product_name }}</a></h4>		
					<div class="ratings">
						<div class="rating-box">
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
					</div>
										
					<div class="price">
						{{-- <span class="price-new">$74.00</span> 
						<span class="price-old">$122.00</span>	 --}}
						@if($pro->discount_price == NULL)            
                         <span class="price-new" itemprop="price">ট {{ $pro->selling_price }}</span>
                        @else
                        @endif
                        @if($pro->discount_price != NULL)
                         <span class="price-new" itemprop="price">ট {{ $pro->discount_price }}</span>
                         <span class="price-old">ট {{ $pro->selling_price }}</span>
                        @else
                        @endif	 
						@if($pro->discount_price == NULL)
						@else
						@php
                        $amount=$pro->selling_price - $pro->discount_price;
                        $discount=$amount/$pro->selling_price * 100;
                        @endphp 
						<span class="label label-percent">
						{{ intval($discount) }}%
					    </span>
						@endif   
					</div>
					<div class="description item-desc hidden">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
					</div>
				</div>
				
				  <div class="button-group">
					<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
					<button class="wishlist addwishlist"  data-id="{{ $row->id }}" title="Add to Wish List"><i class="fa fa-heart"></i></button>
					<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
				  </div>
			</div><!-- right block -->

		</div>
	</div>
	@endforeach

{{-- 
	<div class="clearfix visible-xs-block"></div>


	
	<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
		<div class="product-item-container">
			<div class="left-block">
				<div class="product-image-container lazy second_img ">
					<img data-src="image/demo/shop/product/11.jpg" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="image/demo/shop/product/10.jpg" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
				</div>
				
				<!--full quick view block-->
				<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
				<!--end full quick view block-->
			</div>
			
			
			<div class="right-block">
				<div class="caption">
					<h4><a href="product.html">Canon EOS 5D</a></h4>		
					<div class="ratings">
						<div class="rating-box">
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
					</div>
										
					<div class="price">
						<span class="price-new">$60.00</span> 
						
					</div>
					<div class="description item-desc hidden">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
					</div>
				</div>
				
				  <div class="button-group">
					<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
					<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
					<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
				  </div>
			</div><!-- right block -->

		</div>
	</div> --}}

	


	
</div>					<!--// End Changed listings-->
					<!-- Filters -->
					<div class="product-filter product-filter-bottom filters-panel" >
						<div class="row">
							<div class="col-md-2 hidden-sm hidden-xs">
							</div>
						   <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
								<div class="form-group" style="margin: 7px 10px">{{   $products->links() }}</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 text-right"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">&gt;</a></li><li><a href="#">&gt;|</a></li></ul></div>
									
						 </div>
					</div>
					<!-- //end Filters -->
					
				</div>
				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
		<script type="text/javascript">
      $(document).ready(function() {
            $('.addwishlist').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/wishlist/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }

                     },
                    
                 });
                 
             } else {
                 alert('danger');
             }
              e.preventDefault();
         });
     });

</script>

@endsection
