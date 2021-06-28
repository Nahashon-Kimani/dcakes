@section('title')
    {{ Str::upper($product->name) }}
@endsection


<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">{{ $product->name }}</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-12">
            <div class="product-view row">
                <div class="left-content-product col-lg-12 col-xs-12">
                    <div class="row">
                        <div class="content-product-left  col-sm-6 col-xs-12 ">
                            {{-- <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                <span class="btn-more prev-thumb nt"><i class="fa fa-chevron-up"></i></span>
                                <span class="btn-more next-thumb nt"><i class="fa fa-chevron-down"></i></span>
                                <ul class="thumb-vertical">
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail" data-image="image/demo/shop/product/1.png') }}" title="Canon EOS 5D">
                                            <img src="{{ asset('assets/image/demo/shop/product/1.png') }}" title="Canon EOS 5D" alt="Canon EOS 5D">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="1" class="img thumbnail " data-image="image/demo/shop/product/f9.jpg') }}" title="Bint Beef">
                                            <img src="{{ asset('assets/image/demo/shop/product/f9.jpg') }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="2" class="img thumbnail" data-image="image/demo/shop/product/2.png') }}" title="Bint Beef">
                                            <img src="{{ asset('assets/image/demo/shop/product/2.png') }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="3" class="img thumbnail" data-image="image/demo/shop/product/3.png') }}" title="Bint Beef">
                                            <img src="{{ asset('assets/image/demo/shop/product/3.png') }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="4" class="img thumbnail" data-image="image/demo/shop/product/j9.jpg') }}" title="Bint Beef">
                                            <img src="{{ asset('assets/image/demo/shop/product/j9.jpg') }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    </li>
                                </ul>                              
                            </div> --}}
                            <div class="large-image  vertical">
                                <img itemprop="image" class="product-image-zoom" src="{{ asset('assets/image/product/products/'.$product->image) }}" data-zoom-image="image/demo/shop/product/1.png') }}" title="Bint Beef" alt="Bint Beef">
                            </div>
                            {{-- <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a> --}}
                            
                        </div>

                        <div class="content-product-right col-sm-6 col-xs-12">
                            <div class="title-product">
                                <h1>{{ $product->name }}</h1>
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
                                <div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
                                <div class="product_page_price price">
                                   @if ($product->sale_price > 0)
                                    <span class="price-new" itemprop="price">Ksh. {{ $product->sale_price }}</span>
                                    <span class="price-old">Ksh. {{ $product->regular_price }}</span>
                                   @else
                                    <span class="price-new" itemprop="price">Ksh. {{ $product->regular_price }}</span>
                                    <span class="price-old">Ksh. {{ ($product->regular_price+ 100) }}</span>
                                   @endif
                                </div>
                                
                            </div>

                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="price-tax"><span>Ex Tax:</span> $60.00</div>
                                    <div class="brand"><span>Brand:</span><a href="#">Apple</a>		</div>
                                    <div class="model"><span>Product Code:</span> {{ $product->SKU }}</div>
                                    <div class="reward"><span>Reward Points:</span> 100</div>
                                </div>
                            </div>


                            <div id="product">
                                <h4>Available Options</h4>
                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                            <label>Qty</label>
                                            <input class="form-control" type="text" name="quantity"
                                            value="1" wire:model="qty" disabled>
                                            <input type="hidden" name="product_id" value="50">
                                            <span class="input-group-addon product_quantity_down" wire:click.prevent="decreaseQuantity">−</span>
                                            <span class="input-group-addon product_quantity_up" wire:click.prevent="increaseQuantity">+</span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                        <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="cart.add('42', '1');" wire:click.prevent="storeToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" data-original-title="Add to Cart">
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

                            </div>
                            <!-- end box info product -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bototm-detail">
                <div class="row">
                    <div class="col-lg-3 col-md-4  col-xs-12">
                        <div class="module releate-horizontal">
                            <h3 class="modtitle"><span>Related Products</span></h3>
                            <div class="releate-product ">
                                <div class="product-item-container">	
                                    @foreach ($relatedProducts as $rProduct)
                                        <div class="item-element clearfix">
                                            <div class="image">
                                                <img  src="{{ asset('assets/image/product/products/'.$rProduct->image) }}"  title="{{ $rProduct->name }}" class="img-1 img-responsive" />
                                            </div> 
                                            <div class="caption">
                                                
                                                <div class="ratings">
                                                        <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                </div>
                                                <h4><a href="{{ route('product.details', $rProduct->slug) }}">{{ $rProduct->name }}</a></h4>
                                                <div class="price">
                                                    <span class="price-new">Ksh {{ $rProduct->regular_price }}</span>  
                                                </div>
                                                
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 col-md-8  col-xs-12">
                        <!-- Product Tabs -->
                        <div class="producttab ">
                            <div class="tabsslider  col-xs-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#desc">Description</a></li>
                                    <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
                                    <li class="item_nonactive"><a data-toggle="tab" href="#tags">Tags</a></li>
                                    <li class="item_nonactive"><a data-toggle="tab" href="#custom">Custom Tab</a></li>
                                </ul>
                                <div class="tab-content col-xs-12">
                                    {{-- Tab 1 --}}
                                    <div id="desc" class="tab-pane fade active in">
                                        {!! $product->desc !!}
                                    </div>

                                    {{-- Tab Review --}}
                                    <div id="tab-review" class="tab-pane fade">                                        
                                        <div id="review">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%;"><strong>{{ $product->users->name }}</strong></td>
                                                        <td class="text-right">{{ $product->created_at->toFormattedDateString() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p class="text-justify">{{ $product->short_desc }}</p>
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
                                        
                                        {{-- Review and and comment about this product start --}}
                                        @guest
                                        <div class="alert alert-success">
                                            <i class="fa fa-check-circle"></i>
                                            You need to login first. <a href="{{ route('login') }}">Login Here </a> to comment
                                        </div>
                                        @else
                                            <form>
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
                                        @endguest
                                        {{-- Review and and comment about this product ends --}}
                                    </div>

                                    {{-- Third Tab --}}
                                    <div id="tags" class="tab-pane fade">
                                        <a href="#">{{ $product->categories->name }}</a>			
                                    </div>

                                    {{-- Forth Tab --}}
                                    <div id="custom" class="tab-pane fade">
                                        <table class="data-table" style="width: 100%;" border="1">
                                            <tbody>
                                            <tr>
                                            <td>Brand</td>
                                            <td><img  src="{{ asset('assets/image/demo/shop/category/logo-client.png') }}"  title="Apple Cinema 30&quot;" class="img-1 img-responsive" /></td>
                                            </tr>
                                            <tr>
                                            <td>History</td>
                                            <td>Color sit amet, consectetur adipiscing elit. In gravida pellentesque ligula, vel eleifend turpis blandit vel. Nam quis lorem ut mi mattis ullamcorper ac quis dui. Vestibulum et scelerisque ante, eu sodales mi. Nunc tincidunt tempus varius. Integer ante dolor, suscipit non faucibus a, scelerisque vitae sapien.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- //Product Tabs -->


                        <!-- Upsell Products -->
                        <div class="related upsell titleLine products-list grid module ">
                            <h3 class="modtitle"><span>Upsell Products</span></h3>
                            <div class="upsell-products ">
                                @foreach ($upSellProducts as $upSellProduct)
                                <div class="product-layout">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container second_img ">
                                                <img  src="{{ asset('assets/image/product/products/'.$upSellProduct->image) }}"  title="{{ $upSellProduct->name }}" class="img-1 img-responsive" />
                                                <img  src="{{ asset('assets/image/demo/shop/product/e12.jpg') }}"  title="{{ $upSellProduct->name }}" class="img-2 img-responsive" />
                                            </div>
                                            <!--Sale Label-->
                                            @if ($upSellProduct->sale_price > 0)
                                                <span class="label label-sale">Sale</span>                                                
                                            @endif
                                            
                                        </div>
                                        <div class="button-group">
                                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                                            <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>
                                            <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a>
                                        </div>
                                        
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4><a href="{{ route('product.details',$upSellProduct->slug) }}">{{ $upSellProduct->name }}</a></h4>		
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
                                                    @if ($upSellProduct->sale_price > 0)
                                                        <span class="price-new">Ksh. {{ $upSellProduct->sale_price }}</span> 
                                                            <span class="price-old">{{ $upSellProduct->regular_price }}</span>

                                                            {{-- Calculating the difference --}}
                                                        <span class="label label-percent text-right">
                                                            {{ ((($upSellProduct->sale_price) - ($upSellProduct->regular_price))*100)/($upSellProduct->regular_price) }}%
                                                        </span>
                                                    @else
                                                        <span class="price-new">Ksh. {{ $upSellProduct->regular_price }}</span> 
                                                            <span class="price-old">{{ ($upSellProduct->regular_price)+100 }}</span>

                                                            {{-- Calculating the difference --}}
                                                        <span class="label label-percent text-right">
                                                            {{ (-10000/($upSellProduct->regular_price)) }}%
                                                        </span>
                                                    @endif    
                                                </div>
                                                <div class="description item-desc hidden">
                                                    <p>{{ $upSellProduct->desc }}</p>
                                                </div>
                                            </div>
                                        </div><!-- right block -->

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Middle Part End-->
</div>