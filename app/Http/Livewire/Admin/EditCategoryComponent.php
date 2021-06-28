<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;


    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;        
        $cat = Category::where('slug', $category_slug)->first();
        $this->category_id = $cat->id;
        $this->name = $cat->name;
        $this->slug = $cat->slug; 

    }

    // Genereating SLug
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    // validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);
    }

    // Update category
    public function updateCategory()
    {

        $this->validate([
            'name'=>'required',
            'slug'=>'required:categories',
        ]);
        
        $cat = Category::findOrFail($this->category_id);
        $cat->name = $this->name;
        $cat->slug = $this->slug;
        $cat->save();

        session()->flash('message', 'Category Successfully updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-category-component')->layout('layouts.index');
    }
}
