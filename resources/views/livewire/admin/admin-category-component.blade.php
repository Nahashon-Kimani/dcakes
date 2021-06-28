@section('title', 'HOME CATEGORIES')

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="content">
            @if (Session::has('message'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                {{ Session::get('message') }}
            </div>
            @endif
            <form wire:submit.prevent="updateHomeCategory">
                <div class="col-sm-12 offset-sm-2">
                    <fieldset id="personal-details">
                        <legend class="text-center text-uppercase">Select Categories and no of products</legend>
                        <div class="form-group required" wire:ignore>
                            <label for="input-firstname" class="control-label">First Name</label>
                            <select name="categories[]" multiple class="form-control" wire:model="selected_categories">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="no-of-products" class="control-label">No of Products</label>
                            <input type="text" class="form-control" id="no-of-products" placeholder="No of Products" name="noofproducts" wire:model="noofproducts">
                        </div>
                        <button type="submit" class="btn btn-warning pull-right">Save Changes</button>
                    </fieldset>
                    <br>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>