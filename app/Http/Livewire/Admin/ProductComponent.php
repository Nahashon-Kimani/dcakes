<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('message', 'Product Successfully delete. ');
    }

    public function render()
    {
        $products = Product::latest()->paginate(10);
        return view('livewire.admin.product-component', compact('products'))->layout('layouts.index');
    }
}
