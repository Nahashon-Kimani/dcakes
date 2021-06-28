<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function render()
    {
        $coupons = Coupon::latest()->get();
        return view('livewire.admin.admin-coupons-component', compact('coupons'))->layout('layouts.index');;
    }

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();

        session()->flash('message', 'Coupon successfully deleted!!');
    }
}
