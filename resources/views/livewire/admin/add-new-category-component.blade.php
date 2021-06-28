@section('title', 'NEW CATEGORY')

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="content">
            @if (Session::has('message'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                {{ Session::get('message') }}
            </div>
            @endif
            <form wire:submit.prevent="storeCategory">
                @csrf
                <fieldset id="personal-details">
                    <legend class="text-uppercase">New Category Details</legend>
                    <div class="form-group required">
                        <label for="input-firstname" class="control-label">Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" value="" name="name" wire:model="name" wire:keyup="generateSlug">
                        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="control-label">Category Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Category Slug" value="" name="slug" wire:model="slug">
                        @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning px-5">Submit</button>
                    </div>
                </fieldset>
            </form>
            <br>
        </div>
    </div>
</div>