@section('title', 'CART')

<div class="main-container container">
  <ul class="breadcrumb">
    <li><a href="/"><i class="fa fa-home"></i></a></li>
    <li><a href="/cart">Shopping Cart</a></li>
  </ul>
  
  <div class="row">
    <!--Middle Part Start-->
      <div id="content" class="col-sm-12">
        <h2 class="title">{{ config('app.name') }} Shopping Cart</h2>
        @if (Session::has('success_message'))
          <div class="alert alert-success"><i class="fa fa-check-circle"></i>
            {{ Session::get('success_message') }}
          </div>
        @endif
        @if (Cart::instance('cart')->count()> 0) 
          <div class="table-responsive form-group">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td class="text-center">Image</td>
                  <td class="text-left">Product Name</td>
                  <td class="text-left">SKU</td>                  
                  <td class="text-left">Product Category</td>                  
                  <td class="text-left">Quantity</td>
                  <td class="text-right">Unit Price</td>
                  <td class="text-right">Subtotal</td>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::instance('cart')->content() as $product)
                  <tr>
                    <td class="text-center">
                      <a href="{{ route('product.details', $product->model->slug) }}">
                        <img width="70px" src="{{ asset('assets/image/product/products/'.$product->model->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-thumbnail" />
                      </a>
                    </td>
                    <td class="text-left"><a href="{{ route('product.details', $product->model->slug) }}">{{ $product->name }}</a></td>
                    <td class="text-left">{{ $product->model->SKU }}</td>
                    <td class="text-left">{{ $product->model->categories->name }}</td>
                    <td class="text-center" width="200px">
                      <div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="{{ $product->qty }}" size="1" class="form-control" disabled />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Decrement Quantity" class="btn btn-primary" wire:click.prevent="decreaseQuantity('{{ $product->rowId }}')"><i class="fa fa-minus"></i></button>
                        <button type="submit" data-toggle="tooltip" title="Increment Quantity" class="btn btn-primary" wire:click.prevent="increaseQuantity('{{ $product->rowId }}')"><i class="fa fa-plus"></i></button>
                        {{-- <button type="button" data-toggle="tooltip" title="Remove From Cart" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button> --}}
                        <button type="button" data-toggle="tooltip" title="Remove From Cart" class="btn btn-danger" wire:click.prevent="destroy('{{ $product->rowId }}')"><i class="fa fa-times-circle"></i></button>
                        </span>
                      </div>
                      <a href="#" wire:click.prevent="saveForLater('{{ $product->rowId }}')">Save for Later</a>
                    </td>
                    <td class="text-right">Ksh. {{ $product->model->regular_price }}</td>
                    <td class="text-right">Ksh. {{ $product->subtotal }}</td>
                    {{-- <td class="text-right">{{ Cart::instance('cart')->subtotal() }}</td>
                    <td class="text-right">{{ Cart::instance('cart')->tax() }}</td>
                    <td class="text-right">{{ Cart::instance('cart')->total() }}</td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>            
        @else
          <div class="alert alert-success"><i class="fa fa-check-circle"></i>
            No product in the Cart.<a href="/" title="Cakes"> Continue shopping Here</a> 
          </div>
        @endif
        <h3 class="subtitle no-margin">What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        <div class="row">
          <div class="col-sm-6">
              @if (!Session::has('coupon'))
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Use Coupon Code</h4>
                  </div>
                  {{-- Coupons if exists  --}}
                    @if (Session::has('coupon_message'))
                    <div class="alert alert-danger"><i class="fa fa-check-times"></i> 
                      <p class="text-center">{{ Session::get('coupon_message') }}</p>
                    </div>
                    @endif
                  <form wire:submit.prevent="applyCouponCode">
                    @csrf
                    <div id="collapse-coupon" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <label class="col-sm-4 control-label" for="input-coupon">Enter your coupon here</label>
                        <div class="input-group">
                          <input type="text" name="coupon" placeholder="Enter your coupon here" id="input-coupon" class="form-control" wire:model="couponCode" />
                          <span class="input-group-btn">
                          <input type="submit" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary" />
                          </span></div>
                      </div>
                    </div>
                  </form>
                  {{-- End of coupon  --}}
                </div>
              @endif
           </div>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Use Gift Voucher</h4>
              </div>
              <div id="collapse-voucher" class="panel-collapse collapse in">
                <div class="panel-body">
                  <label class="col-sm-4 control-label" for="input-voucher">Enter gift voucher code here</label>
                  <div class="input-group">
                    <input type="text" name="voucher" value="" placeholder="Enter gift voucher code here" id="input-voucher" class="form-control" />
                    <span class="input-group-btn">
                    <input type="submit" value="Apply Voucher" id="button-voucher" data-loading-text="Loading..."  class="btn btn-primary" />
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       

        {{-- row with items saved for later and estimate shipping --}}
        <div class="row">
          {{-- Items saved for later --}}
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="bestseller">
							<div class="bestseller-inner">
								<div>
									 @if (Session::has('s_success_message'))
                      <div class="alert alert-success"><i class="fa fa-check-circle"></i> 
                        <p class="text-center">{{ Session::get('s_success_message') }}</p>
                      </div>
                      @endif
                  @if (Cart::instance('saveforlater')->count() > 0)
                      <h3 class="text-uppercase">
                        {{ (Cart::instance('saveforlater')->count()) }}
                        Cakes Saved for later 
                      </h3>                      
                      @foreach (Cart::instance('saveforlater')->content() as $item)
                        <div class="product-layout ">
                          <div class="product-thumb transition">
                            <div class="image">
                              <a href="{{ route('product.details',$item->model->slug) }}">
                                <img  src="{{ asset('assets/image/product/products/'.$item->model->image) }}" alt="{{ $item->model->name }}" title="{{ $item->model->name }}" class="img-1 img-responsive" />
                              </a>
                            </div>
                            <div class="caption">
                              <div class="rating">
                                <span class="fa fa-stack text-danger" title="Delete from Cart" wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')"><i class="fa fa-trash fa-stack-2x"></i></span>
                                <span class="fa fa-stack text-warning" title="Add to Cart" wire:click.prevent="moveToCart('{{ $item->rowId }}')"><i class="fa fa-cart-arrow-down fa-stack-2x"></i></span>
                              </div>
                              <h4><a href="{{ route('product.details',$item->model->slug) }}">{{ $item->model->name }}</a></h4>
                              <p class="price">
                              @if ($item->model->sale_price > 0)
                                <span class="price-new"> Ksh. {{ $item->model->sale_price }}</span>
                                <span class="price-old"> Ksh. {{ $item->model->regular_price }}</span>
                              @else
                                <span class="price-old"> Ksh. {{ $item->model->regular_price }}</span>
                                <span class="price-old"> Ksh. {{ ($item->model->regular_price)+100 }}</span>
                              @endif
                              </p>
                            </div>
                            
                          </div>
                        </div>
                      @endforeach
                  @else
                    <div class="alert alert-success"><i class="fa fa-check-circle"></i>
                      No item Saved for later. 
                    </div>
                  @endif

								</div>
							</div>
						</div>
          </div>

          {{-- estimate shipping cost --}}
          <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Estimate Shipping &amp; Taxes</h4>
              </div>
              <div id="collapse-shipping" class="panel-collapse collapse in">
                <div class="panel-body">
                  <p>Enter your destination to get a shipping estimate.</p>
                  <form class="form-horizontal">
                    <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-country">Country</label>
                      <div class="col-sm-10">
                        <select name="country_id" id="input-country" class="form-control">
                          <option value=""> --- Please Select --- </option>
                          <option value="244">Aaland Islands</option>
                          <option value="1">Afghanistan</option>
                          <option value="2">Albania</option>
                          <option value="3">Algeria</option>
                          <option value="4">American Samoa</option>
                          <option value="5">Andorra</option>
                          <option value="6">Angola</option>
                          <option value="7">Anguilla</option>
                          <option value="8">Antarctica</option>
                          <option value="9">Antigua and Barbuda</option>
                          <option value="10">Argentina</option>
                          <option value="11">Armenia</option>
                          <option value="12">Aruba</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="input-zone" name="zone_id">
                          <option value=""> --- Please Select --- </option>
                          <option value="13">Aberdeen</option>
                          <option value="14">Aberdeenshire</option>
                          <option value="15">Anglesey</option>
                          <option value="16">Angus</option>
                          <option value="17">Argyll and Bute</option>
                          <option value="18">Bedfordshire</option>
                          <option value="19">Berkshire</option>
                          <option value="20">Blaenau Gwent</option>
                          <option value="21">Bridgend</option>
                          <option value="22">Bristol</option>
                          <option value="23">Buckinghamshire</option>
                          <option value="24">Caerphilly</option>
                          <option value="25">Cambridgeshire</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                      <div class="col-sm-10">
                        <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control" />
                      </div>
                    </div>
                    <input type="button" value="Get Quotes" id="button-quote" data-loading-text="Loading..." class="btn btn-warning float-right" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- row with items saved for later and estimate shipping --}}


       {{-- If cart is empty then do not show order summary --}}
       @if (Cart::instance('cart')->count() > 0)
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                @if (Session::has('coupon'))
                    <tr>
                      <td class="text-right"><strong>Discount: ({{ Session::get('coupon')['code'] }}):</strong></td>
                      <td class="text-right">Ksh. {{ $discount }}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Sub-Total:</strong></td>
                      <td class="text-right">Ksh. {{ $subtotalAfterDiscount }}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>VAT ({{ config('cart.tax') }})%:</strong></td>
                      <td class="text-right">Ksh. {{ $taxAfterDiscount }}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total:</strong></td>
                      <td class="text-right">Ksh. {{ $totalAfterDiscount }}</td>
                    </tr>
                @else
                    <tr>
                      <td class="text-right"><strong>Sub-Total:</strong></td>
                      <td class="text-right">Ksh. {{ Cart::instance('cart')->subtotal() }}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>VAT (16%):</strong></td>
                      <td class="text-right">Ksh. {{ Cart::instance('cart')->tax() }}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total:</strong></td>
                      <td class="text-right">Ksh. {{ Cart::instance('cart')->total() }}</td>
                    </tr>
                @endif
                
              </table>
            </div>
          </div>
       @else
        <div class="alert alert-success"><i class="fa fa-check-circle"></i> 
          <p class="text-center"> 
            Cart Empty: Add to item to cart 
            <a href="/" title="Shop Here"><u>here</u></a> 
          </p>
        </div>
       @endif

        <div class="buttons">
          <div class="col-sm-12 col-md-4">
            <div class="pull-left"><a href="#" wire:click.prevent="destroyAll()" class="btn btn-danger">Clear Cart Items</a></div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="pull-right pl-4 ml-3"><a href="/" class="btn btn-default">Continue Shopping</a></div>
          </div>
          @if (Cart::instance('cart')->count() > 0)
            <div class="col-sm-12 col-md-4">
              <div class="pull-right"><a href="#" wire:click.prevent="checkout" class="btn btn-warning">Checkout</a></div>
            </div>
          @endif
        </div>
      </div>
      <!--Middle Part End -->
    
  </div>
</div>