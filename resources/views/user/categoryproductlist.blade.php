	<!-- Main Container  -->
	<div class="main-container container">
		
		<div class="row">
			<div id="content" class="col-sm-12">
				
			<div class="module tab-slider titleLine">
				<h3 class="modtitle">All Product</h3>
				<div id="so_listing_tabs_1" class="so-listing-tabs first-load module">
					<div class="loadeding"></div>
					<div class="ltabs-wrap">
						<div class="ltabs-tabs-container" data-rtl="yes" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="1" data-margin="30">
							<!--Begin Tabs-->
							<div class="ltabs-tabs-wrap"> 
							<span class="ltabs-tab-selected">All  Product	</span> <span class="ltabs-tab-arrow">▼</span>
								<div class="item-sub-cat">
									<ul class="ltabs-tabs cf">
										<li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label">All  Product						</span> </li>
									</ul>
								</div>
							</div>
							<!-- End Tabs-->
						</div>
						<div class="ltabs-items-container">
							<!--Begin Items-->
							<div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="10">
								<div class="ltabs-items-inner ltabs-slider ">

									@foreach($products as $row)
									<div class="ltabs-item product-layout">
										<div class="product-item-container">
											<div class="left-block">
												<div class="product-image-container second_img ">
													<img src="{{ asset($row->image_one)}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
													<img src="{{ asset($row->image_two)}}"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
												</div>
												<!--Sale Label-->
												@if($row->discount_price == NULL)
												<span class="label label-new">New</span>
												@else
												@php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
												<span class="label label-sale">
												{{ intval($discount) }}%
											   </span>
												@endif
												
												
												<!--full quick view block-->
												<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
												<!--end full quick view block-->
											</div>
											<div class="right-block">
												<div class="caption">
													<h4><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h4>		
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
														@if($row->discount_price == NULL)
			                                              
			                                              <span class="price-new">ট {{ $row->selling_price }}</span>
			                                            @else
			                                            @endif
			                                            @if($row->discount_price != NULL)
			                                              
			                                             <span class="price-old">ট {{ $row->selling_price }}</span>
			                                             <span class="price-new">ট {{ $row->discount_price }}</span>
			                                            @else
			                                            @endif
																 
													</div>
												</div>
											{{-- <button  
                                               class="addwishlist" data-id="{{ $row->id }}"> 
                                               <div class="product_fav">
                                                  <i class="fa fa-heart text-info"></i>  
                                               </div>
                                            </button> --}}
												  <div class="button-group">
													<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
													<button class="addwishlist"  title="Add to Wish List" data-id="{{ $row->id }}"><i class="fa fa-heart"></i></button>
													<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
												  </div>
											</div><!-- right block -->
										</div>
									</div>
									@endforeach			
								
								</div>
								
							</div>
							
						</div>
						<!--End Items-->
						
						
					</div>
					
				</div>
			</div>
				


				
				<div class="module tab-slider titleLine">
					<h3 class="modtitle">New Products</h3>
					<div id="so_listing_tabs_2" class="so-listing-tabs first-load module">
						<div class="loadeding"></div>
						<div class="ltabs-wrap">
						<div class="ltabs-tabs-container" data-rtl="yes" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="1" data-margin="30">
							<!--Begin Tabs-->
							<div class="ltabs-tabs-wrap"> 
							<span class="ltabs-tab-selected"> New Product</span> <span class="ltabs-tab-arrow">▼</span>
								<div class="item-sub-cat">
									<ul class="ltabs-tabs cf">
										<li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label"> 				New Product</span> </li>
										
									</ul>
								</div>
							</div>
							<!-- End Tabs-->
						</div>
						<div class="ltabs-items-container">
							<!--Begin Items-->
							<div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="10">
								<div class="ltabs-items-inner ltabs-slider ">
									@foreach($newproduct as $pro)
									<div class="ltabs-item product-layout">
										<div class="product-item-container">
											<div class="left-block">
												<div class="product-image-container second_img ">
													<img src="{{ asset($pro->image_one)}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
													<img src="{{ asset($pro->image_two)}}"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
												</div>
												<!--Sale Label-->
												@if($pro->discount_price == NULL)
												<span class="label label-new">New</span>
												@else
												@php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
												<span class="label label-sale">
												{{ intval($discount) }}%
											   </span>
												@endif
												<!--full quick view block-->
												<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
												<!--end full quick view block-->
											</div>
											<div class="right-block">
												<div class="caption">
													<h4><a href="product.html">{{ $pro->product_name }}</a></h4>		
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
														@if($pro->discount_price == NULL)
			                                              
			                                              <span class="price-new">ট {{ $pro->selling_price }}</span>
			                                            @else
			                                            @endif
			                                            @if($pro->discount_price != NULL)
			                                              
			                                             <span class="price-old">ট {{ $pro->selling_price }}</span>
			                                             <span class="price-new">ট {{ $pro->discount_price }}</span>
			                                            @else
			                                            @endif		 
													</div>
												</div>
												
												  <div class="button-group">
													<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
													<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
													<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
												  </div>
											</div><!-- right block -->
										</div>
									</div>
									@endforeach
								</div>
								
							</div>
							<div class="ltabs-items items-category-18 grid" data-total="11">
								<div class="ltabs-loading"></div>

								
							</div>
							<div class="ltabs-items  items-category-25 grid" data-total="11">
								<div class="ltabs-loading"></div>
							</div>
						</div>
						<!--End Items-->
						
						
						</div>
					
					</div>
				</div>

<!--first category--->
{{-- @php 
$cats=DB::table('category')->skip(3)->first();
$category_id=$cats->id;
$products_cat=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();

@endphp
                <div class="module tab-slider titleLine">
					<h3 class="modtitle">{{ $cats->categoty_name }}</h3>
					<div id="so_listing_tabs_2" class="so-listing-tabs first-load module">
						<div class="loadeding"></div>
						<div class="ltabs-wrap">
						<div class="ltabs-tabs-container" data-rtl="yes" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="1" data-margin="30">
							<!--Begin Tabs-->
							<div class="ltabs-tabs-wrap"> 
							<span class="ltabs-tab-selected"> {{ $cats->categoty_name }}</span> <span class="ltabs-tab-arrow">▼</span>
								<div class="item-sub-cat">
									<ul class="ltabs-tabs cf">
										<li class="ltabs-tab tab-sel" data-category-id="27" data-active-content=".items-category-29"> <span class="ltabs-tab-label"> 				{{ $cats->categoty_name }}</span> </li>
										
									</ul>
								</div>
							</div>
							<!-- End Tabs-->
						</div>
						<div class="ltabs-items-container">
							<!--Begin Items-->
							<div class="ltabs-items ltabs-items-selected items-category-29 grid" data-total="27">
								<div class="ltabs-items-inner ltabs-slider ">
									@foreach($products_cat as $cat)
									<div class="ltabs-item product-layout">
										<div class="product-item-container">
											<div class="left-block">
												<div class="product-image-container second_img ">
													<img src="{{ asset($cat->image_one)}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
													<img src="{{ asset($cat->image_two)}}"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
												</div>
												<!--Sale Label-->
												@if($cat->discount_price == NULL)
												<span class="label label-new">New</span>
												@else
												@php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
												<span class="label label-sale">
												{{ intval($discount) }}%
											   </span>
												@endif
												<!--full quick view block-->
												<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
												<!--end full quick view block-->
											</div>
											<div class="right-block">
												<div class="caption">
													<h4><a href="product.html">{{ $cat->product_name }}</a></h4>		
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
														@if($cat->discount_price == NULL)
			                                              
			                                              <span class="price-new">ট {{ $cat->selling_price }}</span>
			                                            @else
			                                            @endif
			                                            @if($cat->discount_price != NULL)
			                                              
			                                             <span class="price-old">ট {{ $cat->selling_price }}</span>
			                                             <span class="price-new">ট {{ $cat->discount_price }}</span>
			                                            @else
			                                            @endif		 
													</div>
												</div>
												
												  <div class="button-group">
													<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
													<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
													<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
												  </div>
											</div><!-- right block -->
										</div>
									</div>
									@endforeach
								</div>
								
							</div>
							<div class="ltabs-items items-category-18 grid" data-total="11">
								<div class="ltabs-loading"></div>

								
							</div>
							<div class="ltabs-items  items-category-25 grid" data-total="11">
								<div class="ltabs-loading"></div>
							</div>
						</div>
						<!--End Items-->
						
						
						</div>
					
					</div>
				</div> --}}

				


				{{-- Category Show  --}}





				
			</div>
		</div>
	</div>
	<!-- //Main Container -->