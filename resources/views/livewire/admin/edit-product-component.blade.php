@section('title', 'EDIT PRODUCT')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Edit Product</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-10 col-sm-offset-1" id="content">
            @if (Session::has('message'))
                <div class="alert alert-success"><i class="fa fa-check-circle"></i> 
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title text-uppercase">Add New Product</h2>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.product') }}"
                      class="btn btn-warning pull-right btn-sm">All Products</a>
                </div>
            </div>
            <form enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <fieldset id="personal-details">
                            <legend>Product Details</legend>
                            <div class="row">
                                {{-- First column --}}
                                <div class="col-sm-5">
                                    <div class="form-group required">
                                        <label for="input-firstname" class="control-label">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-lastname" class="control-label">Product Slug</label>
                                        <input type="text" name="slug" class="form-control" id="input-lastname" placeholder="Slug" wire:model="slug" >
                                        @error('slug') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                {{-- Second Column Short description --}}
                                <div class="col-sm-7">
                                    <div class="form-group required">
                                        <label for="input-lastname" class="control-label">Product Short description</label>
                                        <textarea name="short_desc" wire:model="short_desc" id="" rows="5" class="form-control"></textarea>
                                        @error('short_desc') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                    </div>
                </div>
                {{-- End of first Section --}}


                {{-- second section Prices --}}
                <div class="row">
                    <div class="col-sm-12">
                        <fieldset id="address">
                            <legend>Product Prices</legend>
                            <div class="row">
                                {{-- First Column --}}
                                <div class="col-md-7">
                                    <div class="form-group required">
                                        <label for="input-city" class="control-label">Product Description</label>
                                        <textarea name="desc" wire:model="desc" rows="9" class="form-control"></textarea>
                                        @error('desc') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                {{-- End first column --}}

                                {{-- second column --}}
                                <div class="col-md-5">
                                    <div class="form-group required">
                                        <label for="input-company" class="control-label">Regular Price</label>
                                        <input type="number" name="regular_price" class="form-control" id="input-company" placeholder="Normal Price" wire:model="regular_price">
                                        @error('regular_price') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-address-1" class="control-label">Sale Price</label>
                                        <input type="number" name="sale_price" class="form-control" id="input-address-1" placeholder="Discouted Price"  wire:model="sale_price">
                                        @error('sale_price') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-address-1" class="control-label">Product Category</label>
                                        <select wire:model="category_id" class="form-control" name="category_id">
                                            <option selected disabled>-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                {{-- Third Column here --}}
                <div class="row">
                  <fieldset id="address">
                      <legend>Product SKU and Quantity</legend>
                      <div class="col-md-6">
                        <div class="form-group required">
                            <label for="SKU" class="control-label">SKU</label>
                            <input name="SKU" type="text" class="form-control text-uppercase" id="input-address-1" placeholder="Product SKU"  wire:model="SKU">
                            @error('SKU') <p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="Quantity" class="control-label">QUANTITY</label>
                            <input name="quantity" type="number" class="form-control" id="input-address-1" placeholder="Quantity" wire:model="quantity">
                            @error('quantity') <p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                    </div>
                  </fieldset>
                </div>
                <br>

                {{-- Fourth Column --}}
                <div class="row">
                    <fieldset id="address">
                        <legend>Product Featured Imange</legend>
                            <div class="col-md-4">
                                <div class="form-group required">
                                    <label for="Image" class="control-label">Select Image</label>
                                    <input type="file" class="form-control" wire:model="newImage" name="newImage">
                                    @error('image') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        <div class="col-md-8">
                            {{-- To show the image here --}}
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}"  class="img-fluid img-thumbnail" width="100px" height="100px">

                            @else
                                <img src="{{ asset('assets/image/product/products/'. $image) }}" class="img-fluid img-thumbnail" width="100px" height="100px">
                            @endif
                        </div>
                    </fieldset>
                </div>



                <div class="buttons clearfix">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-md btn-warning" value="Update Product">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End-->
    </div>
</div>