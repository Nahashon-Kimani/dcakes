@section('title', 'NEW PRODUCT')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Add New Product</a></li>
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
            <form enctype="multipart/form-data" wire:submit.prevent="storeProduct">
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
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-lastname" class="control-label">Product Slug</label>
                                        <input type="text" class="form-control" id="input-lastname" name="slug" placeholder="Slug" wire:model="slug" >
                                        @error('slug') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                {{-- Second Column Short description --}}
                                <div class="col-sm-7">
                                    <div class="form-group required">
                                        <label for="input-lastname" class="control-label">Product Short description</label>
                                        <textarea wire:model="short_desc" id="" rows="5" class="form-control" name="short_desc"></textarea>
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
                                        <textarea wire:model="desc" rows="9" class="form-control" name="desc"></textarea>
                                        @error('desc') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                {{-- End first column --}}

                                {{-- second column --}}
                                <div class="col-md-5">
                                    <div class="form-group required">
                                        <label for="input-company" class="control-label">Regular Price</label>
                                        <input type="number" class="form-control" id="input-company" placeholder="Normal Price" name="regular_price" wire:model="regular_price">
                                        @error('regular_price') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-address-1" class="control-label">Sale Price</label>
                                        <input type="number" class="form-control" id="input-address-1" placeholder="Discouted Price" name="sale_price" wire:model="sale_price">
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
                            <input type="text" class="form-control text-uppercase" id="input-address-1" placeholder="Product SKU"  wire:model="SKU" name="SKU">
                            @error('SKU') <p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="Quantity" class="control-label">QUANTITY</label>
                            <input type="number" class="form-control" id="input-address-1" placeholder="Quantity" name="quantity" wire:model="quantity">
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
                                    <input type="file" class="form-control" wire:model="image" name="image">
                                    @error('image') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        <div class="col-md-8">
                            {{-- To show the image here --}}
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}"  class="img-fluid img-thumbnail" width="100px" height="100px">
                            @endif
                        </div>
                    </fieldset>
                </div>



                <div class="buttons clearfix">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-md btn-warning" value="Save Product">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End-->
    </div>
</div>