<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    
    <!-- Basic page needs
	============================================ -->
	<title>HOME || {{ config('app.name') }}</title>
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
						Maxshop © 2016 - 2017. MAGENTECH Store. All Rights Reserved.				
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