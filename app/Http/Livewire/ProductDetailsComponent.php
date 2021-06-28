<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class ProductDetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    // increaing quantity method
    public function increaseQuantity()
    {
        $this->qty++;
    }

    // decreaing quantity method
    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    // Adding to cart
    public function storeToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');

        session()->flash('success_message', 'Product Successfully added to the cart');

        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)->skip(0)->take(4)->latest()->get();
        $upSellProducts = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.product-details-component', compact('product', 'relatedProducts', 'upSellProducts'))->layout('layouts.index');
    }
}