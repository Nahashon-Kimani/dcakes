@section('title', 'NEW COUPON')

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="content">
            @if (Session::has('message'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                {{ Session::get('message') }}
            </div>

            <a href="{{ route('admin.coupons') }}" class="btn btn-warning pull-right">
                All Coupons
            </a>
            @endif
            <form class="form" wire:submit.prevent="storeCoupon">
                @csrf
                <fieldset id="personal-details">
                    <legend class="text-uppercase">New Coupon Details</legend>
                    <div class="form-group required">
                        <label for="coupon-code" class="control-label">Coupon Code</label>
                        <input type="text" class="form-control" id="code" placeholder="Coupon Code" name="code" wire:model="code">
                        @error('code') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    

                    {{-- Coupon Type --}}
                        <div class="row">
                            <div class="form-group required col-sm-6">
                                <label for="input-lastname" class="control-label">Coupon Type</label>
                                <select name="type" class="form-control" wire:model="type">
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                                @error('type') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    
                    
                    <div class="row">
                        <div class="form-group required col-sm-6">
                            <label for="input-lastname" class="control-label">Coupon Value</label>
                            <input type="text" class="form-control" id="value" placeholder="Coupon Value" name="value" wire:model="value">
                            @error('value') <p class="text-danger">{{ $message }}</p> @enderror
                        </div> 

                        {{-- Cart Value  --}}
                        <div class="form-group required col-sm-6">
                            <label for="coupon-code" class="control-label">Expiry Date</label>
                            <input type="date" class="form-control" placeholder="Coupon Expiry Date" name="expiry_date" wire:model="expiry_date">
                            @error('expiry_date') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>

                        {{-- Expiry Date --}}
                        <div class="row">
                            <div class="form-group required col-sm-6">
                                <label for="coupon-code" class="control-label">Cart Value</label>
                                <input type="text" class="form-control" placeholder="Coupon Cart Value" name="cart_value" wire:model="cart_value">
                                @error('cart_value') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-warning px-5 pull-right">Submit</button>
                    </div>
                </fieldset>
            </form>
            <br>
        </div>
    </div>
</div>