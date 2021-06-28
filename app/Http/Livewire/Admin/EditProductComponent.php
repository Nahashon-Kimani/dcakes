<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class EditProductComponent extends Component
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
    public $newImage;
    public $product_id;


    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_desc = $product->short_desc;
        $this->desc = $product->desc;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->image = $product->image;
        $this->product_id = $product->id;
    }

    // generating the slug
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
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
             'newImage'=>'required|mimes:jpg,png,jpeg',
             'category_id'=>'required',
         ]);
     }


    // Function to update product
    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_desc'=>'required',
            'desc'=>'required',
            'regular_price'=>'required|numeric',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'newImage'=>'required|mimes:jpg,png,jpeg',
            'category_id'=>'required',
        ]);


        $product = Product::findOrFail($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_desc = $this->short_desc;
        $product->desc = $this->desc;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        $product->user_id = Auth::id();


        if($this->newImage)
        {
            $imageName = Carbon::now()->timestamp.$this->name.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        
        
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product Updated Successfully');

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.edit-product-component', compact('categories'))->layout('layouts.index');
    }
}
