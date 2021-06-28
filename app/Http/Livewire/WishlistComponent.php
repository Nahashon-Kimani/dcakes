<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    // remove from wishlist
    public function removeFromWishList($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);

        session()->flash('message', 'Item Successfully removed from wishlist');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    // function to empty the wishlist
    public function removeAllfromWishList()
    {
        Cart::instance('wishlist')->destroy();

        session()->flash('message', 'Wish list successfully emptied');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    // function to move from wishhlist to cart
    public function moveProductFromWishListToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.index');
    }
}
