<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    
    <!-- Basic page needs
	============================================ -->
	<title>@yield('title') || {{ config('app.name') }}</title>
	<meta charset="utf-8">
    <meta name="keywords" content="cakes, party, birthday, quote, anniversary, date, dating, wedding" />
    <meta name="author" content="mbuci">
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->

    <link rel="shortcut icon" href="{{ asset('assets/assets/ico/favicon.png') }}">
	
	<!-- Google web fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700|Roboto:400,500,700,900" rel="stylesheet">
	
   
	@include('layouts.includes.header-links')
	@livewireStyles
   

</head>

<body class="common-home res layout-home10 pattern-28">
    
	<div id="wrapper" class="wrapper-boxed banners-effect-7">
		<!-- Header Container  -->
		<header id="header" class=" variantleft type_10">
			<!-- Header Top -->
			<div class="header-top compact-hidden">
				<div class="container">
					<div class="header-top-left pull-left">
						<ul class="top-link">
							<li class="form-group languages-block ">
								<form action="https://demo.smartaddons.com/templates/html/maxshop/index.html" method="post" enctype="multipart/form-data" id="bt-language">
									<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
										<img src="{{ asset('assets/image/demo/flags/gb.png') }}" alt="English" title="English">
										<span class="">English</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="index-2.html"><img class="image_flag" src="{{ asset('assets/image/demo/flags/gb.png') }}" alt="English" title="English" /> English </a></li>
										<li> <a href="index-2.html"> <img class="image_flag" src="{{ asset('assets/image/demo/flags/lb.png') }}" alt="Arabic" title="Arabic" /> Arabic </a> </li>
									</ul>
								</form>
							</li>
							<li class="form-group currency currencies-block">
								<form action="https://demo.smartaddons.com/templates/html/maxshop/index.html" method="post" enctype="multipart/form-data" id="currency">
									<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
										<span class="icon icon-credit "></span> USD <span class="fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu btn-xs">
										<li> <a href="#">(???)&nbsp;Euro</a></li>
										<li> <a href="#">(??)&nbsp;Pounds	</a></li>
										<li> <a href="#">($)&nbsp;USD	</a></li>
									</ul>
								</form>
							</li>
						</ul>
						
					</div>
					<div class="block-cart pull-right">
						<!--cart-->
						@livewire('cart-count-component')
						<!--//cart-->
					</div>
					<div class="header-top-right collapsed-block pull-right">
						<h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
						<div class="tabBlock" id="TabBlock-1">
							<ul class="top-link list-inline">
								<li class="account" id="my_account">
									<a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span >My Account  </span> <span class="fa fa-angle-down"></span></a>
									@guest
										<ul class="dropdown-menu">
											<li><a href="/register"><i class="fa fa-user"></i> Register</a></li>
            								<li><a href="/login"><i class="fa fa-pencil-square-o"></i> Login</a>
										</ul>
									@else
										<ul class="dropdown-menu">
											@if (Auth::user()->user_type == 'ADM')
												<li><a href="#"><i class="fa fa-user"></i> My Account {{ Auth::user()->name }}</a></li>
												<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> Dashboard </a></li>
												<li><a href="{{ route('admin.category') }}"><i class="fa fa-user"></i> Product Category </a></li>
												<li><a href="{{ route('admin.product') }}"><i class="fa fa-user"></i> All Products </a></li>
												<li><a href="{{ route('admin.home-categories') }}"><i class="fa fa-user"></i> Home Categories </a></li>
												<li><a href="{{ route('admin.coupons') }}"><i class="fa fa-user"></i> Coupons </a></li>
												<li><a href="{{ route('admin.orders') }}"><i class="fa fa-user"></i> All Orders </a></li>



												<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i> Logout </a></li>
												<form action="{{ route('logout') }}" method="post" id="logout-form">
													@csrf
													
												</form>
											@else
												<li><a href="#"><i class="fa fa-user"></i> My Account {{ Auth::user()->name }}</a></li>
												<li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i> Dashboard </a></li>
												<li><a href="{{ route('user.orders') }}"><i class="fa fa-user"></i> My Orders </a></li>



												<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i> Logout </a></li>
												<form action="{{ route('logout') }}" method="post" id="logout-form">
													@csrf
													
												</form>
											@endif
										</ul>
									@endguest
								</li>
								
								{{-- wishlist --}}
								@livewire('wishlist-count-component')
								{{-- Wishlist ends --}}

								<li class="checkout "><a href="/checkout" class="top-link-checkoutp" title="Checkout"><span >Checkout</span></a></li>
							</ul>
						</div>
					</div>             
				</div>
			</div>
			<!-- //Header Top --> 
			<!-- Header center -->
			<div class="header-center">
				<div class="container">
					<div class="row">
						<!-- Logo -->
						<div class="navbar-logo col-md-3 col-sm-4 col-xs-12">
							<a href="/"><img src="{{ asset('assets/image/demo/logos/theme_logo_orange.png') }}" title="Your Store" alt="Your Store" /></a>
						</div>
						<!-- //End Logo -->
						<div class="header-center-right col-md-9 col-sm-8 col-xs-12">			
							<div class=" header_search">
								<div id="sosearchpro" class="search-pro">
									<form method="GET" action="https://demo.smartaddons.com/templates/html/maxshop/index.html">
										<div id="search0" class="search input-group">
											<div class="select_category filter_type  icon-select">
												<select class="no-border" name="category_id">
													<option value="0">All Category</option>
													<option value="20">Desktops</option>
													<option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home 9</option>
	
													<option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home 8</option>
	
													<option value="18">Laptops &amp; Notebooks</option>
													<option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Macs</option>
	
													<option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows</option>
	
													<option value="25">Automotive</option>
													<option value="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gadgets &amp; Auto Parts</option>
	
													<option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More Car Accessories</option>
	
													<option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Alarms and Security</option>
	
													<option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Audio &amp; Speakers</option>
	
													<option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Printers</option>
	
													<option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Scanners</option>
	
													<option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Web Cameras</option>
													<option value="57">Mobile &amp; Tablet </option>
													<option value="68">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hanet magente</option>
	
													<option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Knage unget</option>
	
													<option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latenge mange</option>
	
													<option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Punge nenune</option>
	
													<option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qunge genga</option>
	
													<option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tange manue</option>
	
													<option value="17">Electronics </option>
													<option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Angene mafin</option>
	
													<option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Egante mangetes</option>
	
													<option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gante extensg</option>
	
													<option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guntes magesg</option>
	
													<option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rengae manges</option>
	
													<option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sine engain</option>
	
													<option value="33">Apparel</option>
													<option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories</option>
	
													<option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bags</option>
	
													<option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Computers</option>
	
													<option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronics</option>
	
													<option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fashion</option>
	
													<option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</option>
	
													<option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobiles</option>
	
													<option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sports</option>
	
													<option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Watches</option>
	
													<option value="78">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women</option>
	
													<option value="34">Computer</option>
													<option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Camping &amp; Hiking</option>
	
													<option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cusen mariot</option>
	
													<option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Denta magela</option>
	
													<option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Engite nanet</option>
	
													<option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theid cupensg</option>
	
													<option value="59">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verture agoent</option>
												</select>
											</div>	
	
											<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
											<span class="input-group-btn">
											<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
											</span>
										</div>
										<input type="hidden" name="route" value="product/search" />
									</form>
								</div>
							</div>
							<!-- Phone -->
							<div class="phone-contact hidden-xs">
								<div class="inner-info">
									<h2>Hotline:</h2><p>(801) 2345 - 6789</p>
								</div>
							</div>
							<!-- //End Phone -->
						</div>
					</div>
				</div>
			</div>
			<!-- //Header center -->
			<!-- Header Bottom -->
			<div class="header-bottom compact-hidden">
				<div class="container">
				<div class="rows">
					<div class="header-bottom-inner">
						<div class="header-bottom-menu-vertical col-md-3 hidden-sm col-xs-6"></div>
						<div class="header-bottom-menu col-md-9 col-sm-2 col-xs-6">
							<div class="responsive so-megamenu  megamenu-style-dev">
								<nav class="navbar-default">
									<div class=" container-megamenu  horizontal">
										<div class="navbar-header">
											<button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>		
										</div>
										
										<div class="megamenu-wrapper ">
											<span id="remove-megamenu" class="fa fa-times"></span>
											<div class="megamenu-pattern">
												<div class="container">
													<ul class="megamenu " data-transition="slide" data-animationtime="250">
														<li class="home hover">
															<a href="/">Home <b class="caret"></b></a>
															<div class="sub-menu" style="width:100%;" >
																<div class="content" >
																	<div class="row">
																		<div class="col-md-3">
																			<a href="index-2.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-1.jpg') }}" alt="">
																					<span class="btn btn-default"> View...</span>
																				</span> 
																				<h3 class="figcaption">Vanilla Cake</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home2.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-2.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 2</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home3.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-3.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 3</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home4.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-4.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 4</h3> 
																			</a> 
																			
																		</div>
																		
																		<div class="col-md-3">
																			<a href="home5.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-5.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 5</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home6.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-6.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 6</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home7.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-7.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 7</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home8.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-8.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 8</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home9.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-9.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 9</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="home10.html" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-10.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 10</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="#" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-11.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 11</h3> 
																			</a> 
																			
																		</div>
																		<div class="col-md-3">
																			<a href="#" class="image-link"> 
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{ asset('assets/image/demo/menu/home-12.jpg') }}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span> 
																				<h3 class="figcaption">Home page - Layout 12</h3> 
																			</a> 
																			
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="with-sub-menu hover">
															<p class="close-menu"></p>
															<a href="#" class="clearfix">
																<strong>
																	
																	Features
																</strong>
							
																<b class="caret"></b>
															</a>
															<div class="sub-menu" style="width: 100%; right: auto;">
																<div class="content" >
																	<div class="row">
																		<div class="col-md-3">
																			<div class="column">
																				<a href="#" class="title-submenu">Listing pages</a>
																				<div>
																					<ul class="row-list">
																						<li><a href="category.html">Category Page 1 </a></li>
																						<li><a href="category-v2.html">Category Page 2</a></li>
																						<li><a href="category-v3.html">Category Page 3</a></li>
																					</ul>
																					
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="column">
																				<a href="#" class="title-submenu">Product pages</a>
																				<div>
																					<ul class="row-list">
																						<li><a href="product.html">Product Page 1</a></li>
																						<li><a href="product-v2.html">Product Page 2</a></li>
																						<li><a href="product-v3.html">Product Page 3</a></li>
																						<li><a href="product-v4.html">Product Page 4</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="column">
																				<a href="#" class="title-submenu">Shopping pages</a>
																				<div>
																					<ul class="row-list">
																						<li><a href="cart.html">Shopping Cart Page</a></li>
																						<li><a href="checkout.html">Checkout Page</a></li>
																						<li><a href="compare.html">Compare Page</a></li>
																						<li><a href="wishlist.html">Wishlist Page</a></li>
																					
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="column">
																				<a href="#" class="title-submenu">My Account pages</a>
																				<div>
																					<ul class="row-list">
																						<li><a href="login.html">Login Page</a></li>
																						<li><a href="register.html">Register Page</a></li>
																						<li><a href="my-account.html">My Account</a></li>
																						<li><a href="order-history.html">Order History</a></li>
																						<li><a href="order-information.html">Order Information</a></li>
																						<li><a href="return.html">Product Returns</a></li>
																						<li><a href="gift-voucher.html">Gift Voucher</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="with-sub-menu hover">
															<p class="close-menu"></p>
															<a href="#" class="clearfix">
																<strong><img src="{{ asset('assets/image/demo/menu/hot-icon.png') }}" alt="">Pages</strong>
																<b class="caret"></b>
															</a>
															<div class="sub-menu" style="width: 40%; ">
																<div class="content" >
																	<div class="row">
																		<div class="col-md-6">
																			<ul class="row-list">
																				<li><a class="subcategory_item" href="faq.html">FAQ</a></li>
																				<li><a class="subcategory_item" href="typography.html">Typography</a></li>
																				<li><a class="subcategory_item" href="sitemap.html">Site Map</a></li>
																				<li><a class="subcategory_item" href="contact.html">Contact us</a></li>
																				<li><a class="subcategory_item" href="banner-effect.html">Banner Effect</a></li>
																			</ul>
																		</div>
																		<div class="col-md-6">
																			<ul class="row-list">
																				<li><a class="subcategory_item" href="about-us.html">About Us 1</a></li>
																				<li><a class="subcategory_item" href="about-us-2.html">About Us 2</a></li>
																				<li><a class="subcategory_item" href="about-us-3.html">About Us 3</a></li>
																				<li><a class="subcategory_item" href="about-us-4.html">About Us 4</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="with-sub-menu hover">
															<p class="close-menu"></p>
															<a href="#" class="clearfix">
																<strong><img src="{{ asset('assets/image/demo/menu/new-icon.png') }}" alt="">Categories</strong>
																<span class="label"></span>
																<b class="caret"></b>
															</a>
															<div class="sub-menu" style="width: 100%; display: none;">
																<div class="content">
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="row">
																				<div class="col-md-3 img img1">
																					<a href="#"><img src="{{ asset('assets/image/demo/cms/img1.jpg') }}" alt="banner1"></a>
																				</div>
																				<div class="col-md-3 img img2">
																					<a href="#"><img src="{{ asset('assets/image/demo/cms/img2.jpg') }}" alt="banner2"></a>
																				</div>
																				<div class="col-md-3 img img3">
																					<a href="#"><img src="{{ asset('assets/image/demo/cms/img3.jpg') }}" alt="banner3"></a>
																				</div>
																				<div class="col-md-3 img img4">
																					<a href="#"><img src="{{ asset('assets/image/demo/cms/img4.jpg') }}" alt="banner4"></a>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-3">
																			<a href="#" class="title-submenu">Automotive</a>
																			<div class="row">
																				<div class="col-md-12 hover-menu">
																					<div class="menu">
																						<ul>
																							<li><a href="#"  class="main-menu">Car Alarms and Security</a></li>
																							<li><a href="#"  class="main-menu">Car Audio &amp; Speakers</a></li>
																							<li><a href="#"  class="main-menu">Gadgets &amp; Auto Parts</a></li>
																							<li><a href="#"  class="main-menu">More Car Accessories</a></li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<a href="#" class="title-submenu">Electronics</a>
																			<div class="row">
																				<div class="col-md-12 hover-menu">
																					<div class="menu">
																						<ul>
																							<li><a href="#"  class="main-menu">Battereries &amp; Chargers</a></li>
																							<li><a href="#"  class="main-menu">Headphones, Headsets</a></li>
																							<li><a href="#"  class="main-menu">Home Audio</a></li>
																							<li><a href="#"  class="main-menu">Mp3 Players &amp; Accessories</a></li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<a href="#" class="title-submenu">Jewelry &amp; Watches</a>
																			<div class="row">
																				<div class="col-md-12 hover-menu">
																					<div class="menu">
																						<ul>
																							<li><a href="#"  class="main-menu">Earings</a></li>
																							<li><a href="#"  class="main-menu">Wedding Rings</a></li>
																							<li><a href="#"  class="main-menu">Men Watches</a></li>
																							<li><a href="#"  class="main-menu">Women Watches</a></li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<a href="#" class="title-submenu">Bags, Holiday Supplies</a>
																			<div class="row">
																				<div class="col-md-12 hover-menu">
																					<div class="menu">
																						<ul>
																							<li><a href="#"  class="main-menu">Gift &amp; Lifestyle Gadgets</a></li>
																							<li><a href="#"  class="main-menu">Gift for Man</a></li>
																							<li><a href="#"  class="main-menu">Gift for Woman</a></li>
																							<li><a href="#"  class="main-menu">Lighter &amp; Cigar Supplies</a></li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</li>
														
														<li class="with-sub-menu hover">
															<p class="close-menu"></p>
															<a href="#" class="clearfix">
																<strong>Accessories</strong>
																
																<b class="caret"></b>
															</a>
															<div class="sub-menu" style="width: 100%; display: none;">
																<div class="content" style="display: none;">
																	<div class="row">
																		<div class="col-md-8">
																			<div class="row">
																				<div class="col-md-6 static-menu">
																					<div class="menu">
																						<ul>
																							<li>
																								<a href="#"  class="main-menu">Automotive</a>
																								<ul>
																									<li><a href="#">Car Alarms and Security</a></li>
																									<li><a href="#" >Car Audio &amp; Speakers</a></li>
																									<li><a href="3.html#" >Gadgets &amp; Auto Parts</a></li>
																								</ul>
																							</li>
																							<li>
																								<a href="#"  class="main-menu">Smartphone &amp; Tablets</a>
																								<ul>
																									<li><a href="#" >Accessories for i Pad</a></li>
																									<li><a href="#" >Apparel</a></li>
																									<li><a href="#" >Accessories for iPhone</a></li>
																								</ul>
																							</li>
																						</ul>
																					</div>
																				</div>
																				<div class="col-md-6 static-menu">
																					<div class="menu">
																						<ul>
																							<li>
																								<a href="#" class="main-menu">Sports &amp; Outdoors</a>
																								<ul>
																									<li><a href="#" >Camping &amp; Hiking</a></li>
																									<li><a href="#" >Cameras &amp; Photo</a></li>
																									<li><a href="#" >Cables &amp; Connectors</a></li>
																								</ul>
																							</li>
																							<li>
																								<a href="#"  class="main-menu">Electronics</a>
																								<ul>
																									<li><a href="#" >Battereries &amp; Chargers</a></li>
																									<li><a href="#" >Bath &amp; Body</a></li>
																									<li><a href="#" >Outdoor &amp; Traveling</a></li>
																								</ul>
																							</li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<span class="title-submenu">Bestseller</span>
																			<div class="col-sm-12 list-product">
																				<div class="product-thumb">
																					<div class="image pull-left">
																						<a href="#"><img src="{{ asset('assets/image/demo/shop/product/35.jpg') }}" width="80" alt="my good product" title="my good product" class="img-responsive"></a>
																					</div>
																					<div class="caption">
																						<h4><a href="#">my good product</a></h4>
																						<div class="ratings">
																							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						</div>
																						<p class="price">$88.00</p>
																					</div>
																				</div>
																			</div>
																			<div class="col-sm-12 list-product">
																				<div class="product-thumb">
																					<div class="image pull-left">
																						<a href="#"><img src="{{ asset('assets/image/demo/shop/product/W1.html') }}" width="80" alt="Dail Lulpa" title="Dail Lulpa" class="img-responsive"></a>
																					</div>
																					<div class="caption">
																						<h4><a href="#">Dail Lulpa</a></h4>
																						<div class="ratings">
																							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																						   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																						</div>
																						<p class="price">$78.00</p>
																					</div>
																				</div>
																			</div>
																			<div class="col-sm-12 list-product">
																				<div class="product-thumb">
																					<div class="image pull-left">
																						<a href="#"><img src="{{ asset('assets/image/demo/shop/product/141.jpg') }}" width="80" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive"></a>
																					</div>
																					<div class="caption">
																						<h4><a href="#">Canon EOS 5D</a></h4>
																						
																						<div class="ratings">
																							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																						</div>
																						<p class="price">
																							<span class="price-new">$60.00</span>
																							<span class="price-old">$145.00</span>
																							
																						</p>
																					</div>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="">
															<p class="close-menu"></p>
															<a href="blog-page.html" class="clearfix">
																<strong>Blog</strong>
																<span class="label"></span>
															</a>
														</li>
														
														<li class="hidden-md color-buy">
															<p class="close-menu"></p>
															<a href="#" class="clearfix">
																<strong>Buy Theme!</strong>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</nav>
							</div>
						</div>
						
					</div>
				</div>
				</div>
			</div>
		</header>
		<!-- //Header Container  -->


		<!-- Main Container  -->
		{{ $slot }}
		<!-- //Main Container -->
		
		<script type="text/javascript"><!--
			var $typeheader = 'header-home10';
			//-->
		</script>
		<!-- Footer Container -->
		<footer class="footer-container typefooter-4">
			<!-- Footer Top -->
			
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="module social_block col-md-3 col-sm-12 col-xs-12" >
								<ul class="social-block ">
									<li class="facebook"><a class="_blank" href="https://www.facebook.com/MagenTech" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a class="_blank" href="https://twitter.com/smartaddons" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li class="rss"><a class="_blank" href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
									<li class="google_plus"><a class="_blank" href="https://plus.google.com/u/0/+Smartaddons/posts" target="_blank"><i class="fa  fa-google-plus"></i></a></li>
									<li class="pinterest"><a class="_blank" href="https://www.pinterest.com/smartaddons/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								</ul>
							</div>
							<div class="module news-letter col-md-9 col-sm-12 col-xs-12">
								<div class="newsletter">
									<div class="title-block">
										<div class="page-heading">SIGN UP FOR OUR NEWSLETTER</div>
										<div class="pre-text">
											Duis at ante non massa consectetur iaculis id non tellus			
										</div>
									</div>
									<div class="block_content">
										<form method="post" name="signup" id="signup" class="btn-group form-inline signup">
											<div class="form-group required send-mail">
												<div class="input-box">
													<input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail" name="txtemail" size="55">
												</div>
												<div class="subcribe">
													<button class="btn btn-default btn-lg" type="submit" onclick="return subscribe_newsletter();" name="submit">
														Subscribe						</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
			<!-- Footer Center -->
			<div class="footer-center">
				<div class="container content">
					<div class="row">
						<!-- Box Info -->
						<div class="col-md-3 col-sm-6 col-xs-12 collapsed-block footer-links box-footer">
							<div class="module ">
								<div class="content-block-footer">
									<div class="footer-logo">
										<a href="home10.html"><img src="{{ asset('assets/image/demo/logos/theme_logo_orange.png') }}" title="Your Store" alt="Your Store" /></a>
									</div>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>				
						</div>
						<!-- Box Accout -->
						<div class="col-md-3 col-sm-6 box-account box-footer">
							<div class="module clearfix">
								<h3 class="modtitle">My Account</h3>
								<div class="modcontent">
									<ul class="menu">
										<li><a href="#">Brands</a></li>
										<li><a href="#">Gift Certificates</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Specials</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Box Infomation -->
						<div class="col-md-3 col-sm-6 box-information box-footer">
							<div class="module clearfix">
								<h3 class="modtitle">Information</h3>
								<div class="modcontent">
									<ul class="menu">
										<li><a href="#">About Us</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">Pricing Tables</a></li>
										<li><a href="#">Terms And Conditions</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Box About -->
						<div class="col-md-3  col-sm-6 collapsed-block box-footer">
							<div class="module ">
								<h3 class="modtitle">About Us</h3>
								<div class="modcontent">
									<ul class="contact-address">
										<li><span class="fa fa-home"></span> My Company, 42 avenue des Champs</li>
										<li><span class="fa fa-envelope"></span> Email: <a href="#"> sales@yourcompany.com</a></li>
										<li><span class="fa fa-phone">&nbsp;</span> Phone 1: 0123456789</li>
									</ul>
									<ul class="payment-method">
										<li><a title="Payment Method" href="#"><img src="{{ asset('assets/image/demo/cms/payment/payment-1.png') }}" alt="Payment"></a></li>
										<li><a title="Payment Method" href="#"><img src="{{ asset('assets/image/demo/cms/payment/payment-2.png') }}" alt="Payment"></a></li>
										<li><a title="Payment Method" href="#"><img src="{{ asset('assets/image/demo/cms/payment/payment-3.png') }}" alt="Payment"></a></li>
										<li><a title="Payment Method" href="#"><img src="{{ asset('assets/image/demo/cms/payment/payment-4.png') }}" alt="Payment"></a></li>
										<li><a title="Payment Method" href="#"><img src="{{ asset('assets/image/demo/cms/payment/payment-5.png') }}" alt="Payment"></a></li>
									</ul>
								</div>
							</div>				
						</div>
					</div>
				</div>
			</div>		
			<!-- FOOTER BOTTOM -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
						Maxshop ?? 2016 - 2017. MAGENTECH Store. All Rights Reserved.				
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //end Footer Container -->
	
	</div>

	<!-- Social widgets -->
	<section class="social-widgets visible-lg">
		<ul class="items">
			<li class="item item-01 facebook"> <a href="php/facebook8859.html?account=envato" class="tab-icon"><span class="fa fa-facebook"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>FACEBOOK</h5>
					</div>
					<div class="loading">
						<img src="{{ asset('assets/image/theme/lazy-loader.gif') }}" class="ajaxloader" alt="loader">
					</div>
				</div>
			</li>
			<li class="item item-02 twitter"> <a href="php/twitterfdaa.html?account_twitter=envato" class="tab-icon"><span class="fa fa-twitter"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>TWITTER FEEDS</h5> 
					</div>
					<div class="loading">
						<img src="{{ asset('assets/image/theme/lazy-loader.gif') }}" class="ajaxloader" alt="loader">
					</div>
				</div>
			</li>
			<li class="item item-03 youtube"> <a href="php/youtubevideo2de8.html?account_video=PY2RLgTmiZY" class="tab-icon"><span class="fa fa-youtube"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>YouTube</h5>
					</div>
					<div class="loading"> <img src="{{ asset('assets/image/theme/lazy-loader.gif') }}" class="ajaxloader" alt="loader"></div>
				</div>
			</li>
		</ul>
	</section>	<!-- End Social widgets -->

	<link rel='stylesheet' property='stylesheet'  href='{{ asset('assets/assets/css/themecss/cpanel.css') }}' type='text/css' media='all' />
	
	<!-- Preloading Screen -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	 </div>
	<!-- End Preloading Screen -->
	
	<!-- Include Libs & Plugins
	============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->
        @include('layouts.includes.scripts')
		@livewireScripts
</body>

</html>