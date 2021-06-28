<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminCategoryComponent extends Component
{
    public $selected_categories = [];
    public $noofproducts;


    // mount funtion
    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->noofproducts = $category->no_of_products;
    }

    // Updating the home categories
    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->noofproducts;
        $category->save();

        session()->flash('message', 'Home  Categories has been updated successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-category-component', compact('categories'))->layout('layouts.index');
    }
}
