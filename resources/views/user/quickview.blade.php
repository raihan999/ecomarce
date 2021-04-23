	
@extends('layouts.user.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
@include('layouts.user.manubar')
	</header>
	<!-- Main Container  -->
	 <div class="main-container container">
		
		 <div class="row">
			 <!--Middle Part Start-->
			 <div id="content" class="col-md-12 col-sm-12">
				
				 <div class="product-view row">
					 <div class="left-content-product col-lg-12 col-xs-12">
						 <div class="row">
							 <div class="content-product-left  col-sm-6 col-xs-12 ">
								 <div class="large-image  ">
									 <img itemprop="image" class="product-image-zoom" src="{{ asset($product->image_one) }}" data-zoom-image="{{ asset($product->image_one) }}" title="Bint Beef" alt="Bint Beef" />
								 </div>

								 <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
									 <a data-index="0" class="img thumbnail " data-image="{{ asset($product->image_two) }}" title="Bint Beef">
										 <img src="{{ asset($product->image_two) }}"style="height: 100px;width: 100px;" title="Bint Beef" alt="Bint Beef1" />
									 </a>
									 <a data-index="1" class="img thumbnail" data-image="{{ asset($product->image_three) }}" title="Bint Beef">
										 <img src="{{ asset($product->image_three) }}" style="height: 100px;width: 100px;" title="Bint Beef" alt="Bint Beef2" />
									 </a>
									 {{-- <a data-index="2" class="img thumbnail" data-image="{{ asset($product->image_four) }}" title="Bint Beef">
										 <img src="{{ asset($product->image_four) }}" title="Bint Beef" alt="Bint Beef3" />
									 </a> --}}
									 <a data-index="3" class="img thumbnail" data-image="{{ asset($product->image_one) }}" title="Bint Beef">
										 <img src="{{ asset($product->image_one) }}"style="height: 100px;width: 100px;" title="Bint Beef" alt="Bint Beef4" />
									 </a>
								 </div>
								 
							 </div>

							 <div class="content-product-right col-sm-6 col-xs-12">
								 <div class="title-product">
									 <h1>Bint Beef </h1>
								 </div>
								 <!-- Review ---->
								 <div class="box-review form-group">
									 <div class="ratings">
										 <div class="rating-box">
											 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
											 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
											 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
											 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
											 <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										 </div>
									 </div>
									 <a class="reviews_button" href="quickview.php.html" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews </a>	
								 </div>

								 <div class="product-label form-group">
									 <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
										 @if($product->discount_price == NULL)
			                                              
                                         
                                           <span class="price-new" itemprop="price">ট {{ $product->selling_price }}</span>
                                        @else
                                        @endif
                                        @if($product->discount_price != NULL)
                                         <span class="price-new" itemprop="price">ট {{ $product->discount_price }}</span>
                                         <span class="price-old">ট {{ $product->selling_price }}</span>
                                        
                                        @else
                                        @endif
									 </div>
									 <div class="stock"><span>Availability: </span>  <span class="status-stock">In Stock </span></div>
								 </div>

								<div class="product-box-desc">
									<div class="inner-box-desc">
										<div class="price-tax"><span>Ex Tax:</span>ট {{ $product->ex_tax }}</div>
										{{-- <div class="reward"><span>Price in reward points:</span> 400</div> --}}
										<div class="brand"><span>Brand:</span><a href="#">{{ $product->brand_name }}</a>		</div>
										<div class="model"><span>Product Code:</span> {{ $product->product_code }} 15</div>
										{{-- <div class="reward"><span>Reward Points:</span> 100</div> --}}
									</div>
								</div>


								 <div id="product">
									 <h4>Available Options </h4>
									 {{-- <div class="image_option_type form-group required">
										 <label class="control-label">Colors </label>
										 <ul class="product-options clearfix" id="input-option231">
											 <li class="radio">
												 <label>
													 <input class="image_radio" type="radio" name="option[231]" value="33" /> 
													 <img src="image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color" />				 <i class="fa fa-check"></i>
													 <label>  </label>
												 </label>
											 </li>
											 <li class="radio">
												 <label>
													 <input class="image_radio" type="radio" name="option[231]" value="34" /> 
													 <img src="image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color" />				 <i class="fa fa-check"></i>
													 <label>  </label>
												 </label>
											 </li>
											 <li class="radio">
												 <label>
													 <input class="image_radio" type="radio" name="option[231]" value="35" />  <img src="image/demo/colors/green.jpg" data-original-title="green +$12.00" class="img-thumbnail icon icon-color" />				 <i class="fa fa-check"></i>
													 <label>  </label>
												 </label>
											 </li>
											 <li class="selected-option">
											 </li>
										 </ul>
									 </div> --}}
									
									{{--  <div class="box-checkbox form-group required">
										 <label class="control-label">Checkbox </label>
										 <div id="input-option232">
											 <div class="checkbox">
												 <label><input type="checkbox" name="option[232][]" value="36" /> Checkbox 1 (+$12.00)  </label>
											 </div>
											 <div class="checkbox">
												 <label><input type="checkbox" name="option[232][]" value="37" /> Checkbox 2 (+$36.00)  </label>
											 </div>
											 <div class="checkbox">
												 <label><input type="checkbox" name="option[232][]" value="38" /> Checkbox 3 (+$24.00)  </label>
											 </div>
											 <div class="checkbox">
												 <label><input type="checkbox" name="option[232][]" value="39" /> Checkbox 4 (+$48.00)  </label>
											 </div>
										 </div>
									 </div> --}}
									 <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
								     @csrf
									<div class="row">
										<div class="col-lg-4">
										 	 <div class="form-group">
											    <label for="exampleFormControlSelect1">Color</label>
											    <select class="form-control input-sm" id="exampleFormControlSelect1" name="color">
											    	<option selected="" disabled="" style="color:black;">Select Color</option>
											    	@foreach($product_color as $color)
											          <option value="{{ $color }}">{{ $color }}</option>
											      	@endforeach
											    </select>
											  </div>
										 </div>
										 @if($product->product_size == NULL)
										 @else
										 	<div class="col-lg-4">
										 	 <div class="form-group">
											    <label for="exampleFormControlSelect1">Size</label>
											    <select class="form-control input-sm" id="exampleFormControlSelect1" name="size">
											    	<option selected="" disabled="" style="color:black;">Select size</option>
											    	@foreach($product_size as $size)
											          <option value="{{ $size }}">{{ $size }}</option>
											      	@endforeach
											    </select>
											  </div>
										 </div>
										 @endif
										 </div>
									</br>

									 <div class="form-group box-info-product">
										 <div class="option quantity">
											 <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
												 <label>Qty </label>
												 <input class="form-control" type="text" name="qty" value="1" />
												 <input type="hidden" name="product_id" value="50" />
												 <span class="input-group-addon product_quantity_down">− </span>
												 <span class="input-group-addon product_quantity_up">+ </span>
											 </div>
										 </div>
										 <div class="cart">
											 <input type="submit" data-toggle="tooltip" title="" value="Add to Cart"  data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" data-original-title="Add to Cart" />
										 </div>
										</form>
										 <div class="add-to-links wish_comp">
											 <ul class="blank list-inline">
												 <li class="wishlist">
													 <a class="icon addwishlist" data-toggle="tooltip" data-id="{{ $product->id }}"  data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
													 </a>
													 
													 
													 
												 </li>
												 <li class="compare">
													 <a class="icon" data-toggle="tooltip" title="" onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
													 </a>
												 </li>
											 </ul>
										 </div>

									 </div>
									

								 </div>
								 <!-- end box info product -->

							 </div>
						 </div>
					 </div>
					
				
				 </div>
				
				 <script type="text/javascript">
					// Cart add remove functions
					var cart = {
						'add': function(product_id, quantity) {
							parent.addProductNotice('Product added to Cart', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>', 'success');
						}
					}

					var wishlist = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to Wishlist', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
						}
					}
					var compare = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
						}
					}

					
				</script>

				
			 </div>
			
			
		 </div>
		 <!--Middle Part End-->
	 </div>
	 <!-- //Main Container -->
	
 <style type="text/css">
	#wrapper{box-shadow:none;}
	#wrapper > *:not(.main-container){display: none;}
	#content{margin:0}
	.container{width:100%;}
	
	.product-info .product-view,.left-content-product,.box-info-product{margin:0;}
	.left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}

	.left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; clear:none; }
	.add-to-links ul li{margin:0;}
	
</style>
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