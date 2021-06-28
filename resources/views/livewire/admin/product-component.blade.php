@section('title', 'PRODUCTS')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('admin.product') }}">All Products</a></li>
    </ul>
    
    <div class="container">
        @if (Session::has('message'))
        <div class="alert alert-success"><i class="fa fa-check-circle"></i>
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="row" id="content">
            <!--Middle Part Start-->
                    <div class="row">
                        <div class="col-sm-6"><h2 class="title text-uppercase"> All Products</h2></div>
                        <div class="col-sm-6"><a href="{{ route('admin.addproduct') }}" class="btn btn-warning px-5 m-3 pull-right"><i class="fa fa-plus"></i> Add new Product</a></div>
                    </div>
                {{ $products->links() }}
        </div>
        <div class="row" id="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-center">#</td>
                            <td class="text-center">Image</td>
                            <td class="text-center">Name</td>
                            <td class="text-center">Price</td>
                            <td class="text-center">Category</td>
                            <td class="text-center">Stock</td>
                            <td class="text-center">Last Updates</td>
                            <td class="text-center" colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><img width="70px" src="{{ asset('assets/image/product/products/'.$product->image) }}" alt="{{ $product->name }}"> </td>
                                <td>{{ $product->name }}</td>
                                <td><div class="price">Ksh. {{ $product->regular_price }}</div></td>
                                <td>{{ $product->categories->name }}</td>
                                <td>{{ $product->stock_status }}</td>
                                <td>{{ $product->updated_at->toFormattedDateString() }}</td>
                                <td>
                                    <a href="{{ route('admin.editproduct', $product->slug) }}"
                                        class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this product') ||event.stopImmediatePropagation()" class="btn btn-danger btn-sm" wire:click.prevent="deleteProduct({{ $product->id }})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>