<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryProductComponent extends Component
{
    use WithPagination;
    public $category_slug;
    public $sorting;
    public $pageSize;


    // Mounting the category
    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pageSize = 12;
        $this->category_slug = $category_slug;
    }

    // Add items to cart
    public function storeToCart($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        session()->flash('success_message', 'Product Successfully added to the cart');

        return redirect()->route('product.cart');
    }

    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        
        // sorting
        if ($this->sorting == 'date') {
            $products = Product::where('category_id', $category_id)->latest()->paginate($this->pageSize);
        }
        else if($this->sorting == 'price')
        {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'asc')->latest()->paginate($this->pageSize); 
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'desc')->latest()->paginate($this->pageSize);
        }
        else
        {
            $products = Product::where('category_id', $category_id)->latest()->paginate($this->pageSize);
        }
        


        $allCategories = Category::all();
        return view('livewire.category-product-component', compact('category', 'products', 'allCategories'))->layout('layouts.index');
    }
}
