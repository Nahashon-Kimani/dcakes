<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEditCouponsComponent extends Component
{

    public $code, $type, $value, $cart_value, $coupon_id, $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->coupon_id = $coupon->id;
        $this->expiry_date = $coupon->expiry_date;     
        
    }

    // Lifecycle for the updates
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }

    // function to store coupon
    public function UpdateCoupon()
    {
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);

        $coupon = Coupon::findOrFail($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->user_id = Auth::id();
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();

        session()->flash('message', 'Coupon Successfully Updated');
        
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupons-component')->layout('layouts.index');
    }
}
