<div class="shopping_cart ">
    <div id="cart" class=" btn-group btn-shopping-cart">
        <a data-loading-text="Loading..." class="btn-group top_cart dropdown-toggle" data-toggle="dropdown">
            <div class="shopcart">
                <span class="handle pull-left"></span>
                <span>My Cart</span>
                @if (Cart::instance('cart')->count() > 0)
                    <span class="total-shopping-cart cart-total-full">	{{ Cart::instance('cart')->count() }}</span>
                @endif
            </div>
        </a>
        <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">							
            <li>
                <table class="table table-striped">
                    <tbody>
                        @foreach (Cart::instance('cart')->content() as $cartItem)
                            <tr>
                                <td class="text-center" style="width:70px">
                                    <a href="{{ route('product.details', $cartItem->model->slug) }}"> 
                                        <img src="{{ asset('assets/image/product/products/'.$cartItem->model->image) }}" style="width:70px" alt="{{ $cartItem->model->name }}" title="{{ $cartItem->model->name }}" class="preview"> 
                                    </a>
                                </td>
                                <td class="text-left"> 
                                    <a class="cart_product_name" href="{{ route('product.details', $cartItem->model->slug) }}">
                                        {{ $cartItem->model->name }}
                                    </a> 
                                </td>
                                
                                <td class="text-center"> {{ $cartItem->qty }} </td>
                                <td class="text-center"> Ksh. 
                                    @if ($cartItem->model->sale_price > 0)
                                        {{ $cartItem->model->sale_price }}
                                    @else
                                        {{ $cartItem->model->regular_price }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('product.details', $cartItem->model->slug) }}" class="fa fa-edit"></a>
                                </td>
                                <td class="text-right">
                                    <a href="#" wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}')" class="fa fa-plus fa-delete"></a>
                                </td>
                                <td>
                                    <a href="#" wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')" class="fa fa-minus fa-delete"></a>
                                </td>
                                <td class="text-right">
                                    <a href="#" wire:click.prevent="destroy('{{ $cartItem->rowId }}')" class="fa fa-times fa-delete"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
            <li>
                <div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-left"><strong>Sub-Total</strong>
                                </td>
                                <td class="text-right">{{ Cart::instance('cart')->subtotal() }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>VAT (16%)</strong>
                                </td>
                                <td class="text-right">{{ Cart::instance('cart')->tax() }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>Total</strong>
                                </td>
                                <td class="text-right">{{ Cart::instance('cart')->total() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-center"> 
                        <a class="btn view-cart" href="/cart"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; 
                        @if (Cart::instance('cart')->count() > 0)
                           @guest
                                <a class="btn btn-mega checkout-cart" href="login"><i class="fa fa-share"></i>Checkout</a> 
                           @else
                                <a class="btn btn-mega checkout-cart" href="/checkout"><i class="fa fa-share"></i>Checkout</a> 
                           @endguest
                        @endif
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>