<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    public $couponCode;
    public $discount, $subtotalAfterDiscount, $taxAfterDiscount, $totalAfterDiscount;
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

    // removing product from the Cart::instance('cart')->
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Item Removed from the Cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    // Remove all items from the cart
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message', 'Cart Empltied');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    // function to move item from save for later back to cart
    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');

        session()->flash('s_success_message', 'Item successfully moved to cart');
    }

    // delete from save for later
    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveforlater')->remove($rowId);

        session()->flash('s_success_message', 'Item Successfully removed from save fr later');
    }

    // function to save product for  later
    public function saveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');

        session()->flash('success_message', 'Item successfully saved for later');
    }

    // Function to apply coupon code
    public function applyCouponCode()
    {
        // return $this->couponCode;
        $coupon = Coupon::where([
                ['code', $this->couponCode], 
                ['expiry_date', '>=', Carbon::today()],
                ['cart_value', '<=', Cart::instance('cart')->subtotal()]
            ])->first();

        if(!$coupon)
        {
            session()->flash('coupon_message', 'Invalid Coupon Code');
            return;
        }

        session()->put('coupon', [
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,

        ]);
    }

    // FUnction to caluculate discounts
    public function calulateDiscount()
    {
        if (session()->has('coupon')) 
        {
            if (session()->get('coupon')['type'] == 'fixed') 
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }

            $this->subtotalAfterDiscount = (Cart::instance('cart')->subtotal()) - ($this->discount);
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    // Function to checkout: if user is login in then checkout else, checkout
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

    // Checkout 
    public function setAmountforCheckout()
    {
        if (!Cart::instance('cart') > 0) {
           session()->forget('checkout');
           return;
        }
        
        if (session()->has('coupon'))
        {
            session()->put('checkout', [
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount,
            ]);
        }
        else
        {
            session()->put('checkout', [
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        if (session()->has('coupon'))
        {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
               session()->forget('coupon');
            }
            else
            {
                $this->calulateDiscount();
            }
        }

        $this->setAmountforCheckout();
        $topCategories = Category::all();
        return view('livewire.cart-component', compact('topCategories'))->layout('layouts.index');
    }
}
