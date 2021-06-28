@section('title')
    {{ Str::upper($category->name) }}
@endsection


<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">{{ Str::upper($category->name) }}</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
         <aside class="col-md-3 col-sm-4" id="column-right">
            <div class="module menu-category titleLine">
                <h3 class="modtitle"><span>Cake Categories</span></h3>
                <div class="modcontent">
                    <div class="box-category">
                        <ul id="cat_accordion" class="list-group">
                            @foreach ($allCategories as $singleCategory)
                                <li class="hadchild"><a href="{{ route('product.category', $singleCategory->slug) }}" class="cutom-parent">{{ $singleCategory->name }}</a><span class="button-view  fa fa-plus-square-o"></span>
                                    {{-- Getting all cakes unders this category loops --}}
                                    <ul style="display: block;">
                                        @foreach ($singleCategory->products as $catProduct)
                                            <li><a href="{{ route('product.details', $catProduct->slug) }}">{{ $catProduct->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- <div class="module tags-product titleLine">
               <h3 class="modtitle"><span>Tags</span></h3>
               <div class="modcontent" style="margin-top: 20px;">
                    <ul class="tags_cloud">
                        <li><a href="#" class="button_grey">allergy</a></li>
                        <li><a href="#" class="button_grey">baby</a></li>
                        <li><a href="#" class="button_grey">beauty</a></li>
                        <li><a href="#" class="button_grey">care</a></li>
                        <li><a href="#" class="button_grey">for hecarim</a></li>
                        <li><a href="#" class="button_grey">for him</a></li>
                        <li><a href="#" class="button_grey">first aid</a></li>
                        <li><a href="#" class="button_grey">gift sets</a></li>
                        <li><a href="#" class="button_grey">spa</a></li>
                        <li><a href="#" class="button_grey">hair care</a></li>
                        <li><a href="#" class="button_grey">herbs</a></li>
                        <li><a href="#" class="button_grey">medi</a></li>
                        <li><a href="#" class="button_grey">natural</a></li>
                        <li><a href="#" class="button_grey">oral</a></li>
                        <li><a href="#" class="button_grey">pain</a></li>
                        <li><a href="#" class="button_grey">pedicure</a></li>
                        <li><a href="#" class="button_grey">personal care</a></li>
                    </ul>
               </div> 
            </div> 

            <div class="module">
                <div class="modcontent clearfix">
                    <div class="banners">
                        <div>
                            <a href="#"><img src="{{ asset('assets/image/demo/cms/left-image-static.png') }}" alt="left-image"></a>
                        </div>
                    </div>
                    
                </div>
            </div>--}}

        </aside>
        
        <!--Right Part Start -->
       <div id="content" class="col-md-9 col-sm-8">
            <div class="products-category">
                <div class="category-derc">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banners">
                                <div>
                                    <a  href="#"><img src="{{ asset('assets/image/demo/shop/category/electronic-cat.png') }}" alt="Apple Cinema 30&quot;"><br></a>
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
                                <select id="input-sort" class="form-control" wire:model="sorting">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="date">Sort by Newness</option>
                                    <option value="price">Price (Low &gt; High)</option>
                                    <option value="price-desc">Price (High &gt; Low)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-limit">Show:</label>
                                <select id="input-limit" class="form-control" wire:model="pageSize">
                                    <option value="" selected="selected">12</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
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
                <!-- //end Filters -->

                <!--changed listings-->
                <div class="products-list row grid">

                    @foreach ($products as $product)
                    <div class="product-layout col-md-3 col-sm-6 col-xs-12">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container lazy second_img ">
                                    <img data-src="{{ asset('assets/image/product/products/'.$product->image) }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-2 img-responsive" />
                                    <img data-src="{{ asset('assets/image/product/products/'.$product->image) }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-1 img-responsive" />
                                </div>

                                    @if ($product->sale_price >0)
                                        <!--Sale Label-->
                                        <span class="label label-sale">Sale</span>
                                        <!--countdown box-->
                                        <div class="countdown_box">
                                            <div class="countdown_inner">
                                                <div class="defaultCountdown-30"></div>
                                            </div>
                                        </div>
                                        <!--end countdown box-->   
                                    @endif

                            </div>
                            
                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h4>		
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
                                        @if ($product->sale_price > 0)
                                            <span class="price-new">Ksh. {{ $product->sale_price }}</span> 
                                            <span class="price-old">Ksh. {{ $product->regular_price }}</span>		 
                                            <span class="label label-percent">
                                                {{ ((($product->sale_price)-($product->regular_price)*100))/($product->regular_price) }}
                                            </span> 
                                        @else
                                        <span class="price-new">Ksh. {{ $product->regular_price }}</span> 
                                        <span class="price-old">Ksh. {{ ($product->regular_price)+100 }}</span>		 
                                        <span class="label label-percent">
                                            {{ -10000/($product->regular_price) }}
                                        </span> 
                                        @endif   
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p class="text-justify">
                                            {{ $product->short_desc }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- right block -->
                            <div class="button-group">
                                <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                                <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');" wire:click.prevent="storeToCart({{ $product->id}}, '{{ $product->name }}', {{ $product->regular_price }})"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs name-cart">Add to Cart</span></button>
                                <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                {{-- <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-xs-block"></div>
                    @endforeach

                </div>					<!--// End Changed listings-->
                <!-- Filters -->
                <div class="product-filter product-filter-bottom filters-panel" >
                    <div class="row">
                        <div class="col-md-2 hidden-sm hidden-xs">
                        </div>
                       <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                            <div class="form-group" style="margin: 3px 10px">{{ $products->links() }}</div>
                        </div>
                        <div class="box-pagination col-md-3 col-sm-4 text-right">
                            {{ $products->links() }}
                        </div>
                                
                     </div>
                </div>
                <!-- //end Filters -->
                
            </div>
        </div>
        <!--right Part End -->
    </div>
    <!--Middle Part End-->
</div>