<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CheckoutComponent extends Component
{

    public $shippingToDifferent;

    public $firstName;
    public $lastName;
    public $email;
    public $mobile;
    public $location;
    public $special_instruction;
    public $ready_by;
    

    // Shipping to different location properties
    public $s_firstName;
    public $s_lastName;
    public $s_email;
    public $s_mobile; 
    public $s_location;
    public $s_special_instruction;
    public $s_ready_by;


    public $paymentMode;

    public $thankYou;
    

    // lifecycle hook metho
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'location'=>'required',
            'ready_by'=>'required',
            'paymentMode'=>'required',
        ]);

        if ($this->shippingToDifferent) 
        {
            $this->validateOnly($fields, [
                's_firstName'=>'required',
                's_lastName'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required|numeric',
                's_location'=>'required',
                's_ready_by'=>'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'location'=>'required',
            'ready_by'=>'required',
            'paymentMode'=>'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->name = $this->firstName. ' '. $this->lastName;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->location = $this->location;
        $order->special_instructions = $this->special_instruction;
        $order->country = 'Kenya';
        $order->status = 'ordered';
        $order->ready_by = $this->ready_by;
        $order->is_shipping_different = $this->shippingToDifferent ? 1:0;
        $order->save();


        foreach (Cart::instance('cart')->content() as $item) 
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->shippingToDifferent)
        {
            $this->validate([
                's_firstName'=>'required',
                's_lastName'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required|numeric',
                's_location'=>'required',
                // 's_ready_by'=>'required',
                // 'paymentMode'=>'required',
            ]);


            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->name = $this->s_firstName. ' '. $this->s_lastName;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->location = $this->s_location;
            // $shipping->special_instructions = $this->s_special_instruction;
            // $shipping->country = 'Kenya';
            // $shipping->ready_by = $this->s_ready_by;
            $shipping->save();
        }


        if ($this->paymentMode == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        
        $this->thankYou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }


    // function to 
    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        else if($this->thankYou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.index');
    }
}
