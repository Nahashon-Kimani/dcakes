<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    // function to delete category
    public function deleteCategory($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();

        session()->flash('message', 'Category Successfully deleted');
    }

    public function render()
    {
        $categories = Category::latest()->paginate(10);
        return view('livewire.admin.category-component', compact('categories'))->layout('layouts.index');
    }
}
