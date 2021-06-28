<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AddNewCategoryComponent extends Component
{
    public $name;
    public $slug;

    // Function to generate slug
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    // Creating Hook method
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);
    }

    // Storing the caegory
    public function storeCategory()
    {
        // Validation
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);

        $cat = new Category();
        $cat->name = $this->name;
        $cat->slug= $this->slug;
        $cat->user_id = Auth::id();
        $cat->save();

        session()->flash('message', 'Category Created successfully');
        // return redirect()->route('admin.category');
        
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-new-category-component', compact('categories'))->layout('layouts.index');
    }
}
