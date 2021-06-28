<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class AdminAddCouponsComponent extends Component
{
    public $code, $type, $value, $cart_value, $expiry_date;


    // Lifecycle for the updates
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }

    // function to store coupon
    public function storeCoupon()
    {
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->user_id = Auth::id();
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();

        session()->flash('message', 'Coupon Successfully created');
        
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupons-component')->layout('layouts.index');
    }
}
