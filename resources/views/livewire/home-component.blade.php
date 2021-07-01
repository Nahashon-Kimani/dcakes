<div>
    <!-- Header Container  -->
		<header id="header" class=" variantleft type_10">
			<!-- Header Top -->
			<div class="header-top compact-hidden">
				<div class="container">
					<div class="header-top-left pull-left">
						<ul class="top-link">
							<li class="form-group languages-block ">
								<form action="#" method="post" enctype="multipart/form-data" id="bt-language">
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
								<form action="#" method="post" enctype="multipart/form-data" id="currency">
									<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
										<span class="icon icon-credit "></span> USD <span class="fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu btn-xs">
										<li> <a href="#">(€)&nbsp;Euro</a></li>
										<li> <a href="#">(£)&nbsp;Pounds	</a></li>
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
											<li><a href="{{ route('admin.product') }}"><i class="fa fa-user"></i> All Product </a></li>
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

								{{-- Wish list --}}
								@livewire('wishlist-count-component')
								{{-- Wishlist ends --}}

								<li class="checkout "><a href="/checkout" class="top-link-checkout" title="Checkout"><span >Checkout</span></a></li>
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
									<form method="GET" action="#">
										<div id="search0" class="search input-group">
											<div class="select_category filter_type  icon-select">
												<select class="no-border" name="category_id">
													@foreach ($allCategories as $singleCategory)
														<option value="{{ $singleCategory->id }}">{{ $singleCategory->name }}</option>
													@endforeach
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
						<div class="header-bottom-menu-vertical col-md-3 hidden-sm col-xs-6">
							<!-- Mod Vertical Menu -->
							<div class="responsive so-megamenu megamenu-style-dev">
								<div class="so-vertical-menu no-gutter compact-hidden">
									<nav class="navbar-default">	
										
										<div class="container-megamenu vertical open">
											<div id="menuHeading">
												<div class="megamenuToogle-wrapper">
													<div class="megamenuToogle-pattern">
														<div class="container">
															<div>
																<span></span>
																<span></span>
																<span></span>
															</div>
															Categories							
															<i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="navbar-header">
												<button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
													<span class="icon-bar" style="width: 12px;"></span>
													<span class="icon-bar" style="width: 16px;"></span>
													<span class="icon-bar"></span>
												</button>	
											</div>
											<div class="vertical-wrapper" >
												<span id="remove-verticalmenu" class="fa fa-times"></span>
												<div class="megamenu-pattern">
													<div class="container">
														<ul class="megamenu">
															@foreach ($allCategories as $categorySingle)
																<li class="item-vertical css-menu with-sub-menu hover">
																	<p class="close-menu"></p>
																	<a href="{{ route('product.category', $categorySingle->slug) }}" class="clearfix">
																		<img src="{{ asset('assets/image/theme/icons/icon3.png') }}" alt="icon">
																		<strong>
																			<span>{{ $categorySingle->name }}</span>
																			<b class="fa fa-angle-right"></b>
																		</strong>
																	</a>
																	<div class="sub-menu" data-subwidth="30" style="width: 270px; display: none; right: 0px;">
																		<div class="content"  style="display: none;">
																			<div class="row">
																				<div class="col-sm-12">
																					<div class="categories ">
																						<div class="row">
																							<div class="col-sm-12 hover-menu">
																								<div class="menu">
																									<ul>
                                                                                                        @foreach ($categorySingle->products as $product)
                                                                                                            <li>
                                                                                                                <a href="{{ route('product.details', $product->slug) }}" class="main-menu" title="{{ $product->name }}">
                                                                                                                    {{ $product->name }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endforeach																										
																									</ul>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</li>
                                                            @endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</nav>
								</div>
							</div>
							<!-- //End Mod -->
						</div>
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
																						<a href="#"><img src="{{ asset('assets/image/demo/shop/product/35.jpg') }}" width="80" alt="Filet Mign" title="Filet Mign" class="img-responsive"></a>
																					</div>
																					<div class="caption">
																						<h4><a href="#">Filet Mign</a></h4>
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

    <main id="content" class="page-main">
        <!-- Block Spotlight1  -->
        <div class="so-spotlight1 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-9 col-md-12 box_slider">
                        <div id="sohomepage-slider-home3">
                            <div class="slider-container "> 
                                <div id="so-slideshow" class="">
                                    <div class="module slideshow no-margin">
                                        <div class="item">
                                            <a href="#"><img src="{{ asset('assets/image/demo/slider/sl10/2.jpg') }}" alt="slider1" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img src="{{ asset('assets/image/demo/slider/sl10/1.jpg') }}" alt="slider1" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img src="{{ asset('assets/image/demo/slider/sl10/3.jpg') }}" alt="slider1" class="img-responsive"></a>
                                        </div>
                                    </div>
                                    <div class="loadeding"></div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!--Block Spotlight2  -->
        <div class="so-spotlight2">
            <div class="container">
                <!-- Banner Bottom -->
                <div class="module box-bn-top row">
                    <div class="col-sm-3 img-item"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-2-h10.png') }}" alt="Static Image"></a></div>
                    <div class="col-sm-3 img-item"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-3-h10.png') }}" alt="Static Image"></a></div>
                    <div class="col-sm-3 img-item"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-4-h10.png') }}" alt="Static Image"></a></div>
                    <div class="col-sm-3 img-item"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-5-h10.png') }}" alt="Static Image"></a></div>
                </div>
                <!-- End Banner -->
                <div class="text-center bottom-space">
                    <h1 class="size-lg no-padding">WELCOME TO <span class="logo-font custom-color">{{ config('app.name') }}</span> STORE</h1>
                    <div class="line-divider"></div>
                    <p class="custom-color-alt">Lorem ipsum dolor sit amet, ex eam mundi populo accusamus, aliquam quaestio petentium te cum.
                        <br> Vim ei oblique tacimates, usu cu iudico graeco. Graeci eripuit inimicus vel eu, eu mel unum laoreet splendide, cu integre apeirian has.
                    </p>
                </div>
                <div class="module box-services row">
                     <div class="item-ser col-sm-4 col-xs-4"><a href="#"><img src="{{ asset('assets/image/demo/banner/h10-01.png') }}" alt="Banner"></a></div>
                     <div class="item-ser col-sm-4 col-xs-4"><a href="#"><img src="{{ asset('assets/image/demo/banner/h10-02.png') }}" alt="Banner"></a></div>
                     <div class="item-ser col-sm-4 col-xs-4"><a href="#"><img src="{{ asset('assets/image/demo/banner/h10-03.png') }}" alt="Banner"></a></div>
                </div>
            </div>
        </div>
        <!--Block Spotlight3  -->
        <div class="so-spotlight3">
            <div class="container">
    
                 {{-- sorting data starts here --}}
                 <div class="product-filter filters-panel" style="margin-bottom: 20px!important;">
                    <div class="row">
                        <div class="col-md-2 visible-lg">
                            <div class="view-mode">
                                <div class="list-view">
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
                            <div class="form-group short-by">
                                <label class="control-label" for="input-sort">Sort By:</label>
                                <select id="input-sort" class="form-control"   wire:model="sorting">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="date">Sort by Newness</option>
                                    <option value="price">Price (Low &gt; High)</option>
                                    <option value="price-desc">Price (High &gt; Low)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-limit">Show:</label>
                                <select id="input-limit" class="form-control"  wire:model="pageSize">
                                    <option value="" selected="selected">9</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                            <ul class="pagination">
                               {{ $products->links() }}
                            </ul>
                        </div>
                    </div>
                </div> 
                {{-- sorting data ends --}}
    
                <!-- Mod Supercategory 1 -->
                <div class="module cus-style-supper-cate">
                    <div class="header">
                        <h3 class="modtitle">
                            <span class="icon-color">
                                <i class="fa fa-empire   #8ec319"></i>
                                SPONGE &amp; VANILLA			
                            </span>
                        </h3>	
                    </div>
                    <div id="so_super_category_1" class="so-sp-cat first-load">
                        <div class="spcat-wrap ">
                            <div class="main-left">
                                <div class="banner-post-text">
                                     <a href="#" title="banner"> <img src="{{ asset('assets/image/demo/banner/1-h10.jpg') }}" alt="banner">  </a>                        				
                                </div>
                                
                            </div>
    
    
                            
                            <div class="main-right">									
                                <div class="spcat-items-container products-list grid show-pre show-row"><!--Begin Items-->	 								
                                    <div class="spcat-items spcat-items-loaded items-category-sales product-layout spcat-items-selected" data-total="9">
                                        <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                            <div class="ltabs-items-inner ltabs-slider ">	
                                                {{-- Looping through the products under this category --}}
                                                @foreach ($products as $product)
                                                    <div class="ltabs-item ">
                                                        <div class="item-inner product-thumb product-item-container transition ">
                                                            <div class="left-block">
                                                                <div class="product-image-container">
                                                                    <div class="image">
                                                                        <a class="lt-image" href="{{ route('product.details', $product->slug) }}" target="_self" title="{{ $product->name }}">
                                                                            <img  src="{{ asset('assets/image/product/products/'.$product->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-1 img-responsive" />
                                                                            <img  src="{{ asset('assets/image/product/products/'.$product->image) }}" alt="img" title="{{ $product->name }}" class="img-2 img-responsive" />
                                                                        </a>
                                                                    </div>				
                                                                </div>
                                                                {{-- <span class="label label-new">New</span> --}}
                                                                @if ($product->sale_price > 0)
                                                                    <span class="label label-sale">Sale</span>
                                                                @endif
                                                            </div>
                                                            <div class="right-block">
                                                                <div class="caption">
                                                                    <div class="rating">
                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    </div>					
                                                                    <h4>
                                                                        <a href="{{ route('product.details', $product->slug) }}" title="{{ $product->name }}" target="_self">{{ $product->name }}</a>
                                                                    </h4>				
                                                                    <p class="price">
                                                                        @if ($product->sale_price > 0)
                                                                            <span class="price-new">Ksh. {{ $product->sale_price }}</span> <span class="price-old">Ksh. {{ $product->regular_price }}</span>
                                                                        @else
                                                                            <span class="price-new">Ksh. {{ $product->regular_price }}</span> <span class="price-old">Ksh. {{ ($product->regular_price) + 100 }}</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="button-group">
                                                                <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');" wire:click.prevent="addToWishList({{ $product->id}}, '{{ $product->name }}', {{ $product->regular_price }})"><i class="fa fa-heart"></i></button>
                                                                <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');" wire:click.prevent="storeToCart({{ $product->id}}, '{{ $product->name }}', {{ $product->regular_price }})"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>
                                                                {{-- <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" ><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button> --}}
                                                                <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                                                <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{-- Looping through the products under this category --}}                                           
                                            </div>
                                        </div>
                                    </div>	
                                </div>
                                <!--End Items-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Mod -->
                <!-- Banner Content -->
                <div class="module box-bn-content">
                    <a title="Static Image" href="category.html"><img src="{{ asset('assets/image/demo/cms/img-1-h10.jpg') }}" alt="Static Image"></a>
                </div>
                <!-- End Banner -->
                <!-- Mod Supercategory 2 -->
                <div class="module cus-style-supper-cate cate-v2">
                    <div class="header">
                        <h3 class="modtitle">
                            <span class="icon-color">
                                <i class="fa fa-empire   #8ec319"></i>
                                CAKE CATEGORIES
                            </span>
                        </h3>	
                    </div>
                    
                    <div id="so_super_category_2" class="so-sp-cat first-load">
                        <div class="spcat-wrap ">
                            <div class="spcat-tabs-container" data-delay="300" data-duration="600" data-effect="flip" data-ajaxurl="#" data-modid="155">
                                <!--Begin Tabs-->
                                    <div class="spcat-tabs-wrap">
                                        <span class="spcat-tab-selected">	Rating	</span>
                                        <span class="spcat-tab-arrow">▼</span>
                                        <ul class="spcat-tabs cf">
                                            @foreach ($hCategories as $key=>$hCategory)
                                                <li class="spcat-tab {{ $key==0 ? 'active' : ''}}" data-active-content=".items-category-sale" data-field_order="sales">
                                                    <span class="spcat-tab-label">{{ $hCategory->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                <!-- End Tabs-->
                            </div>
                            <div class="main-left">
                                <div class="banner-post-text">
                                     <a href="#" title="banner"> <img src="{{ asset('assets/image/demo/banner/2-h10.jpg') }}" alt="banner">  </a>                        				
                                </div>
                                
                            </div>
                            <div class="main-right">									
									<div class="spcat-items-container products-list grid show-pre show-row">
                                        <!--Begin Items-->	
                                            <div class="spcat-items spcat-items-loaded items-category-sale product-layout spcat-items-selected" data-total="9">
                                                <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                                    <div class="ltabs-items-inner ltabs-slider ">

                                                        @foreach ($s_products as $s_product)
                                                        <div class="ltabs-item ">
                                                            <div class="item-inner product-thumb product-item-container transition ">
                                                                <div class="left-block">
                                                                    <div class="product-image-container">
                                                                        <div class="image">
                                                                            <a class="lt-image" href="{{ route('product.details', $s_product->slug) }}" target="_self" title="{{ $s_product->name }}">
                                                                                <img  src="{{ asset('assets/image/product/products/'.$s_product->image) }}" alt="img" title="{{ $s_product->name }}" class="img-1 img-responsive" />
                                                                                <img  src="{{ asset('assets/image/product/products/'.$s_product->image) }}" alt="img" title="{{ $s_product->name }}" class="img-2 img-responsive" />
                                                                            </a>
                                                                        </div>
                                                                                        
                                                                    </div>
                                                                    @if ($s_product->sale_price > 0)
                                                                        <span class="label label-new">Sale</span>
                                                                    @endif
                                                                </div>
                                                                <div class="right-block">
                                                                    <div class="caption">
                                                                        <div class="rating">
                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                        </div>					
                                                                        <h4>
                                                                            <a href="{{ route('product.details', $s_product->slug) }}" title="{{ $s_product->name }}" target="_self">{{ $s_product->name }}</a>
                                                                        </h4>				
                                                                        <p class="price">
                                                                            @if ($s_product->sale_price > 0)
                                                                                <span class="price-new">{{ $s_product->sale_price }}</span>
                                                                            @else
                                                                                <span class="price-new">{{ $s_product->regular_price }}</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="button-group">
                                                                    <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                                                                    <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');" wire:click.prevent="storeToCart({{ $s_product->id}}, '{{ $s_product->name }}', {{ $s_product->regular_price }})"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>
                                                                    <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                                                    {{-- <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        

                                                    </div>
                                                </div>
                                            </div>
									</div>
									<!--End Items-->
								</div>
                        </div>
                    </div>
                </div>
                <!-- End Mod -->
                
            </div>
        </div>
        <!--Block Spotlight4  -->
        <div class="so-spotlight4">
            <div class="container">
                <div class="module box-bn-bottom row">
                    <div class="col-sm-6 item-bt"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-6-h10.jpg') }}" alt="Static Image"></a></div>
                    <div class="col-sm-6"><a href="#"><img src="{{ asset('assets/image/demo/cms/img-7-h10.jpg') }}" alt="Static Image"></a></div>
                    
                </div>
                <div class="row box-bestseller">
                    <div class="bestseller col-md-4 col-sm-6 col-xs-12">
                        <div class="bestseller-inner">
                            <div>
                                <h3>Best sellers</h3>
                                
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t8.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Facilis duidem gokensie rerum </a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $9.00</span>
                                            <span class="price-old">$12.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t13.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Duidem gokensie rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $23.00</span>
                                            <span class="price-old">$29.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t12.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Gokensie Duidem  rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $2.00</span>
                                            <span class="price-old">$3.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller col-md-4 col-sm-6 col-xs-12">
                        <div class="bestseller-inner">
                            <div>
                                <h3>SPECIALS</h3>
                                
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t1.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Thicin gokensie rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $13.00</span>
                                            <span class="price-old">$19.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t6.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Gokensie rerum facilis Loene</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $23.00</span>
                                            <span class="price-old">$39.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/fo4.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Duidem gokensie rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $13.00</span>
                                            <span class="price-old">$15.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller col-md-4 hidden-sm col-xs-12">
                        <div class="bestseller-inner">
                            <div>
                                <h3>RECOMENDED</h3>
                                
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/t15.jpg') }}" alt=""  title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Facilis Rerum Duidem gokensie  </a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $13.00</span>
                                            <span class="price-old">$19.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/fo16.jpg') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Duidem gokensie rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $23.00</span>
                                            <span class="price-old">$29.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="product.html"><img  src="{{ asset('assets/image/demo/shop/product/b2.png') }}" alt="" title="Duidem rerum facilis" class="img-1 img-responsive" /></a></div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <h4><a href="product.html">Duidem gokensie rerum facilis</a></h4>
    
                                            <p class="price">
                                            <span class="price-new"> $123.00</span>
                                            <span class="price-old">$159.00</span>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main >
</div>