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
			<li><a href="#">Bint Beef</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-md-12 col-sm-12">
				
				<div class="product-view row">
					<div class="left-content-product col-lg-10 col-xs-12">
						<div class="row">
							<div class="content-product-left  col-sm-7 col-xs-12 ">
								<div id="thumb-slider-vertical" class="thumb-vertical-outer">
									<span class="btn-more prev-thumb nt"><i class="fa fa-angle-up"></i></span>
									<span class="btn-more next-thumb nt"><i class="fa fa-angle-down"></i></span>
									<ul class="thumb-vertical">
										<li class="owl2-item">
											<a data-index="0" class="img thumbnail" data-image="{{ asset($product->image_one) }}" title="Canon EOS 5D">
												<img src="{{ asset($product->image_one) }}" title="Canon EOS 5D" alt="Canon EOS 5D">
											</a>
										</li>
										<li class="owl2-item">
											<a data-index="1" class="img thumbnail " data-image="{{ asset($product->image_two) }}" title="Bint Beef">
												<img src="{{ asset($product->image_two) }}" title="Bint Beef" alt="Bint Beef4">
											</a>
										</li>
										<li class="owl2-item">
											<a data-index="2" class="img thumbnail" data-image="{{ asset($product->image_three) }}" title="Bint Beef">
												<img src="{{ asset($product->image_three) }}" title="Bint Beef" alt="Bint Beef3">
											</a>
										</li>
										<li class="owl2-item">
											<a data-index="3" class="img thumbnail" data-image="{{ asset($product->image_two) }}" title="Bint Beef">
												<img src="{{ asset($product->image_two) }}" title="Bint Beef" alt="Bint Beef2">
											</a>
										</li>
									</ul>
									
									
								</div>
								<div class="large-image  vertical">
									<img itemprop="image" class="product-image-zoom" src="{{ asset($product->image_one) }}" data-zoom-image="{{ asset($product->image_one) }}" title="Bint Beef" alt="Bint Beef1">
								</div>
								<a class="thumb-video pull-left" href="{{ $product->video_link }}"><i class="fa fa-youtube-play"></i></a>
								
							</div>

							<div class="content-product-right col-sm-5 col-xs-12">
								<div class="title-product">
									<h1>{{ $product->product_name }}</h1>
								</div>
								<!-- Review ---->
								<div class="box-review form-group">
									<div class="ratings">
										<div class="rating-box">
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										</div>
									</div>

									<a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>	| 
									<a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
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
									<div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
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
									<h4>Available Options</h4>
									{{-- <div class="image_option_type form-group required">
										<label class="control-label">Colors</label>
										
											
												
													<select class="form-control input-sm" id="exampleFormControlSelect1" name="color">
														<option selected="" disabled="" style="color:black;">Select Color</option>
											    	@foreach($product_color as $color)
											    	
											          <option value="{{ $color }}">{{ $color }}</option>
											      	@endforeach
											    </select>22

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
												<label>Qty</label>
												<input class="form-control" type="text" name="qty"
												value="1">
												<input type="hidden" name="product_id" value="50">
												<span class="input-group-addon product_quantity_down">−</span>
												<span class="input-group-addon product_quantity_up">+</span>
											</div>
										</div>
										<div class="cart">
											<input type="submit" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg"  data-original-title="Add to Cart">
										</div>
										<div class="add-to-links wish_comp">
											<ul class="blank list-inline">
												<li class="wishlist">
													<a class="icon" data-toggle="tooltip" title=""
													onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
													</a>
												</li>
												<li class="compare">
													<a class="icon" data-toggle="tooltip" title=""
													onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
													</a>
												</li>
											</ul>
										</div>

									</div>
								</form>

								</div>
								<!-- end box info product -->

							</div>
						</div>
					</div>
					
					<section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
						<div class="module col-sm-12 four-block">
							<div class="modcontent clearfix">
								<div class="policy-detail">
									<div class="banner-policy">
										<div class="policy policy1">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	90 day
											<br> money back </a>
										</div>
										<div class="policy policy2">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	In-store exchange </a>
										</div>
										<div class="policy policy3">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	lowest price guarantee </a>
										</div>
										<div class="policy policy4">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	shopping guarantee </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				
				<!-- Product Tabs -->
				<div class="producttab ">
	<div class="tabsslider  col-xs-12">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
		</ul>
		<div class="tab-content col-xs-12">
			<div id="tab-1" class="tab-pane fade active in">
				<p>
					{!! $product->product_details !!}
				</p>	
			</div>
			<div id="tab-review" class="tab-pane fade">
				<form>
					<div id="review">
						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<td style="width: 50%;"><strong>Super Administrator</strong></td>
									<td class="text-right">29/07/2015</td>
								</tr>
								<tr>
									<td colspan="2">
										<p>Best this product opencart</p>
										<div class="ratings">
											<div class="rating-box">
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="text-right"></div>
					</div>
					<h2 id="review-title">Write a review</h2>
					<div class="contacts-form">
						<div class="form-group"> <span class="icon icon-user"></span>
							<input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}"> 
						</div>
						<div class="form-group"> <span class="icon icon-bubbles-2"></span>
							<textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
						</div> 
						<span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>
						
						<div class="form-group">
						 <b>Rating</b> <span>Bad</span>&nbsp;
						<input type="radio" name="rating" value="1"> &nbsp;
						<input type="radio" name="rating"
						value="2"> &nbsp;
						<input type="radio" name="rating"
						value="3"> &nbsp;
						<input type="radio" name="rating"
						value="4"> &nbsp;
						<input type="radio" name="rating"
						value="5"> &nbsp;<span>Good</span>
						
						</div>
						<div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
					</div>
				</form>
			</div>
			<div id="tab-4" class="tab-pane fade">
				<a href="#">Monitor</a>,
				<a href="#">Apple</a>				
			</div>
			<div id="tab-5" class="tab-pane fade">
				<p>Lorem ipsum dolor sit amet, consetetur
					sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore
					magna aliquyam erat, sed diam voluptua.
					At vero eos et accusam et justo duo
					dolores et ea rebum. Stet clita kasd
					gubergren, no sea takimata sanctus est
					Lorem ipsum dolor sit amet. Lorem ipsum
					dolor sit amet, consetetur sadipscing
					elitr, sed diam nonumy eirmod tempor
					invidunt ut labore et dolore magna aliquyam
					erat, sed diam voluptua. </p>
				<p>At vero eos et accusam et justo duo dolores
					et ea rebum. Stet clita kasd gubergren,
					no sea takimata sanctus est Lorem ipsum
					dolor sit amet. Lorem ipsum dolor sit
					amet, consetetur sadipscing elitr.</p>
				<p>Sed diam nonumy eirmod tempor invidunt
					ut labore et dolore magna aliquyam erat,
					sed diam voluptua. At vero eos et accusam
					et justo duo dolores et ea rebum. Stet
					clita kasd gubergren, no sea takimata
					sanctus est Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
	</div>
</div>
				<!-- //Product Tabs -->
				<!-- Related Products -->
				{{-- Category wise product show modoule  --}}
{{-- @php 
$cats=DB::table('category')->skip(3)->first();
$category_id=$cats->id;
$products_cat=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();


@endphp
 <div class="related titleLine products-list grid module ">
	<h3 class="modtitle">{{ $cats->categoty_name }} </h3>
	<div class="releate-products ">
		@foreach($products_cat as $cat_pro)
		<div class="product-layout">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container second_img ">
						<img  src="{{ $cat_pro->image_one }}"  title="Apple Cinema 30&quot;" class="img-responsive" />
						<img  src="{{ $cat_pro->image_two }}"  title="Apple Cinema 30&quot;" class="img_0 img-responsive" />
					</div>
					
					@if($cat_pro->discount_price == NULL)
							<span class="label label-new">New</span>
					@else
					@endif
					<!--full quick view block-->
					<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
					<!--end full quick view block-->
				</div>
				
				
				<div class="right-block">
					<div class="caption">
						<h4><a href="product.html">{{ $cat_pro->product_name }}</a></h4>		
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
							@if($cat_pro->discount_price == NULL)
	                          
	                          <span class="price-new">ট {{ $cat_pro->selling_price }}</span>
	                        @else
	                        @endif
	                        @if($cat_pro->discount_price != NULL)
	                          
	                         <span class="price-old">ট {{ $cat_pro->selling_price }}</span>
	                         <span class="price-new">ট {{ $cat_pro->discount_price }}</span>
	                        @else
	                        @endif	 
	                        @if($cat_pro->discount_price == NULL)
							@else
							@php
                            $amount=$row->selling_price - $row->discount_price;
                            $discount=$amount/$row->selling_price * 100;
                            @endphp 
							<span class="label label-percent">
							{{ intval($discount) }}% OFF
						   </span>
							@endif
							    
						</div>
						<div class="description item-desc hidden">
							<p>{{ $cat_pro->product_details }}</p>
						</div>
					</div>
					
					  <div class="button-group">
						<button class="addToCart addcart" type="button" data-toggle="tooltip" title="Add to Cart"  data-id="{{ $row->id }}"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
						<button class="addwishlist" type="button" data-toggle="tooltip" title="Add to Wish List" data-id="{{ $row->id }}"><i class="fa fa-heart"></i></button>
						<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
					  </div>
				</div><!-- right block -->

			</div>
		</div>
		@endforeach
		
	</div>
</div> --}}

{{-- Category wise product show  end --}}

				<script type="text/javascript">
					$(document).ready(function() {
						var zoomCollection = '.large-image img';
						$( zoomCollection ).elevateZoom({
							zoomType    : "inner",
							lensSize    :"200",
							easing:true,
							gallery:'thumb-slider-vertical',
							cursor: 'pointer',
							galleryActiveClass: "active"
						});
						$('.large-image').magnificPopup({
							items: [
								{src: 'image/demo/shop/product/J9.jpg' },
								{src: 'image/demo/shop/product/J6.jpg' },
								{src: 'image/demo/shop/product/J5.jpg' },
								{src: 'image/demo/shop/product/J4.jpg' },
							],
							gallery: { enabled: true, preload: [0,2] },
							type: 'image',
							mainClass: 'mfp-fade',
							callbacks: {
								open: function() {
									
									var activeIndex = parseInt($('#thumb-slider-vertical .img.active').attr('data-index'));
									var magnificPopup = $.magnificPopup.instance;
									magnificPopup.goTo(activeIndex);
								}
							}
						});
						$("#thumb-slider-vertical .owl2-item").each(function() {
							$(this).find("[data-index='0']").addClass('active');
						});
						
						$('.thumb-video').magnificPopup({
						  type: 'iframe',
						  iframe: {
							patterns: {
							   youtube: {
								  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
								  id: 'v=', // String that splits URL in a two parts, second part should be %id%
								  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
									},
								}
							}
						});
						
						$('.product-options li.radio').click(function(){
							$(this).addClass(function() {
								if($(this).hasClass("active")) return "";
								return "active";
							});
							
							$(this).siblings("li").removeClass("active");
							$(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
						});
						
						var _isMobile = {
						  iOS: function() {
						   return navigator.userAgent.match(/iPhone/i);
						  },
						  any: function() {
						   return (_isMobile.iOS());
						  }
						};
						
						$(".thumb-vertical-outer .next-thumb").click(function () {
							$( ".thumb-vertical-outer .lSNext" ).trigger( "click" );
						});
		
						$(".thumb-vertical-outer .prev-thumb").click(function () {
							$( ".thumb-vertical-outer .lSPrev" ).trigger( "click" );
						});

						$(".thumb-vertical-outer .thumb-vertical").lightSlider({
							item: 3,
							autoWidth: false,
							vertical:true,
							slideMargin: 15,
							verticalHeight:340,
				            pager: false,
							controls: true,
				            prevHtml: '<i class="fa fa-angle-up"></i>',
				            nextHtml: '<i class="fa fa-angle-down"></i>',
							responsive: [
								{
									breakpoint: 1199,
									settings: {
										verticalHeight: 330,
										item: 3,
									}
								},
								{
									breakpoint: 1024,
									settings: {
										verticalHeight: 235,
										item: 2,
										slideMargin: 5,
									}
								},
								{
									breakpoint: 768,
									settings: {
										verticalHeight: 340,
										item: 3,
									}
								}
								,
								{
									breakpoint: 480,
									settings: {
										verticalHeight: 100,
										item: 1,
									}
								}
				
							]
							
				        });
		
						
						
						// Product detial reviews button
						$(".reviews_button,.write_review_button").click(function (){
							var tabTop = $(".producttab").offset().top;
							$("html, body").animate({ scrollTop:tabTop }, 1000);
						});
					});
						
				</script>

				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->

@endsection