<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderComponent extends Component
{

    public function render()
    {
        $orders = Order::latest()->paginate(15);
        return view('livewire.admin.admin-order-component', compact('orders'))->layout('layouts.index');
    }
}
