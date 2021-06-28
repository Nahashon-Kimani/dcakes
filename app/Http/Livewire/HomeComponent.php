<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    use WithPagination;

    // sortinf data properties
    public $sorting;
    public $pageSize;

    public function mount()
    {
        $this->sorting= "default";
        $this->pageSize = 8;
    }

    public function storeToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');

        session()->flash('success_message', 'Product Successfully added to the cart');

        return redirect()->route('product.cart');
    }

    // function to add to wish list
    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    // Increasing the cart qunatity
    // increment Quantity item
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;

        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }


    // decrement Quantity item
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;

        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }


    // removing product from the cart
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Item Removed from the cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    // Function to the checkout
    public function checkout()
    {
        if (Auth::check()) 
        {
            return redirect()->route('checkout');
        } 
        else 
        {
            return redirect()->route('login');
        }
    }


    
    public function render()
    {

        // sorting
        if ($this->sorting == 'date') {
            $products = Product::latest()->paginate($this->pageSize); //change this later to the  first most popular cake category or two categories
        }
        else if($this->sorting == 'price')
        {
            $products = Product::orderBy('regular_price', 'asc')->latest()->paginate($this->pageSize); //change this later to the  first most popular cake category or two categories
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::orderBy('regular_price', 'desc')->latest()->paginate($this->pageSize); //change this later to the  first most popular cake category or two categories
        }
        else
        {
            $products = Product::latest()->paginate($this->pageSize); //change this later to the  first most popular cake category or two categories
        }

        $allCategories = Category::latest()->get();

        // sorting data based on home categories
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $hCategories = Category::whereIn('id', $cats)->get();
        $noOfProducts = $category->no_of_products;
        $s_products = Product::inRandomOrder()->latest()->take(8)->get();

        return view('livewire.home-component', compact('products', 'allCategories', 'hCategories', 'noOfProducts', 's_products'))->layout('layouts.base');
    }
}
