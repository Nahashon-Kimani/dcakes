@section('title', 'WISHLIST')

    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('product.wishlist') }}">My Wish List</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
           <div class="container">
            <div id="content" class="col-sm-12">
                <h2 class="title">My Wish List</h2>
                @if (Cart::instance('wishlist')->count() > 0)

                @if (Session::has('message'))
                    <div class="alert alert-success"><i class="fa fa-check-circle"></i>
                        {{ Session::get('message') }}
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Product Name</td>
                                    <td class="text-left">SKU</td>
                                    <td class="text-left">Product Category</td>
                                    <td class="text-right">Unit Price</td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('wishlist')->content() as $product)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route('product.details', $product->model->slug) }}">
                                                <img width="70px" src="{{ asset('assets/image/product/products/'.$product->model->image) }}"
                                                    alt="{{ $product->model->name }}" title="{{ $product->model->name }}">
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            <a href="{{ route('product.details', $product->model->slug) }}">
                                                {{ $product->model->name }}
                                            </a>
                                        </td>
                                        <td class="text-left">{{ $product->model->SKU }}</td>
                                        <td class="text-right">{{ $product->model->categories->name }}</td>
                                        <td class="text-right">
                                            @if ($product->model->sale_price > 0)
                                                <div class="price">Ksh. {{ $product->model->sale_price }} </div>
                                            @else
                                                <div class="price">Ksh. {{ $product->model->regular_price }} </div>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-danger" 
                                                title="Remove from Wishlist" 
                                                data-toggle="tooltip" href="#" 
                                                wire:click.prevent="removeFromWishList('{{ $product->rowId }}')"
                                                data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </a>

                                            <button class="btn btn-primary" title="Add to Cart" 
                                                    data-toggle="tooltip" onclick="cart.add('48');" 
                                                    wire:click.prevent="moveProductFromWishListToCart('{{ $product->rowId }}')"
                                                    type="button" data-original-title="Add to Cart"><i
                                                    class="fa fa-shopping-cart"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-success"><i class="fa fa-check-circle"></i>
                        <p class="text-center">No item in your wishlist</p>
                    </div>
                @endif
                            <a class="btn btn-danger" 
                                title="Empty Wishlist" 
                                class="btn btn-warning"
                                data-toggle="tooltip" href="#" 
                                wire:click.prevent="removeAllfromWishList()"
                                data-original-title="Empty Wish List">
                                Empty Wish Lish
                            </a>
            </div>             
           </div>
            <!--Middle Part End-->
        </div>
    </div>
