	
@extends('layouts.user.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
@include('layouts.user.manubar')
	</header>
		<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">My Wish List</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-9">
				<h2 class="title">My Wish List</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-left">Model</td>
								<td class="text-right">Stock</td>
								<td class="text-right">Unit Price</td>
								<td class="text-right">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($product as $row)
							<tr>
								<td class="text-center">
									<a  href="product.html"><img width="70px" src="{{ asset($row->image_one) }}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
									</a>
								</td>
								<td class="text-left"><a href="{{ $row->product_name }}">iPad</a>
								</td>
								<td class="text-left">{{ $row->product_code }}</td>
								<td class="text-right">In Stock</td>
								<td class="text-right">
									<div class="price">
									 @if($row->discount_price == NULL)            
                                         <span class="price-new" itemprop="price">ট {{ $row->selling_price }}</span>
                                        @else
                                        
                                        @endif
                                        @if($row->discount_price != NULL)
                                          
                                     
                                         <span class="price-new" itemprop="price">ট {{ $row->discount_price }}</span>
                                         <span class="price-old">ট {{ $row->selling_price }}</span>
                                        
                                        @else
                                        @endif
									</div>
								
								</td>
								<td class="text-right">
									<button class="btn btn-primary"
									title="" data-toggle="tooltip"
									onclick="cart.add('48');"
									type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
									</button>
									<a class="btn btn-danger" title="" data-toggle="tooltip" href="http://localhost/2.2.0.0-compiled/index.html?route=account/wishlist&amp;remove=48"data-original-title="Remove"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<!--Middle Part End-->
			<aside class="col-sm-3 hidden-xs" id="column-right">
				<h2 class="subtitle">Account</h2>
				<div class="list-group">
					<ul class="list-item">
						<li><a href="login.html">Login</a>
						</li>
						<li><a href="register.html">Register</a>
						</li>
						<li><a href="#">Forgotten Password</a>
						</li>
						<li><a href="#">My Account</a>
						</li>
						<li><a href="#">Address Books</a>
						</li>
						<li><a href="wishlist.html">Wish List</a>
						</li>
						<li><a href="#">Order History</a>
						</li>
						<li><a href="#">Downloads</a>
						</li>
						<li><a href="#">Reward Points</a>
						</li>
						<li><a href="#">Returns</a>
						</li>
						<li><a href="#">Transactions</a>
						</li>
						<li><a href="#">Newsletter</a>
						</li>
						<li><a href="#">Recurring payments</a>
						</li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
	<!-- //Main Container -->
@endsection
