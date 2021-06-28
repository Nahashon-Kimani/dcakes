<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddNewProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_desc;
    public $desc;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;


    // The mount function
    public function mount()
    {
        $this->stock_status = 'Instock';
        $this->featured = false;

    }

    // Validation
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_desc'=>'required',
            'desc'=>'required',
            'regular_price'=>'required|numeric',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpg,png,jpeg',
            'category_id'=>'required',
        ]);
    }

    // generate slug
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    // function to add products
    public function storeProduct()
    {

        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_desc'=>'required',
            'desc'=>'required',
            'regular_price'=>'required|numeric',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpg,png,jpeg',
            'category_id'=>'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_desc = $this->short_desc;
        $product->desc = $this->desc;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        $product->user_id = Auth::id();

        $imageName = Carbon::now()->timestamp.$this->name.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product created Successfully');

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-new-product-component', compact('categories'))->layout('layouts.index');
    }
}
