@section('title', 'MY ORDER DETAILS')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Order Infomation</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title">My Order Information</h2>`
                </div>
            </div>

            {{-- Order Information Table --}}
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Order Details</td>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td style="width: 50%;" class="text-left"> 
                            <p><b>Order ID: </b><span class="text-warning"> {{ $order->id }}</span><br></p>
                            <p><b>Date Added: </b> {{ $order->created_at->toFormattedDateString() }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- Transaction details table --}}
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Transaction Details</td>
                    </tr>
                </thead>
                <tbody>
                    <td style="width: 50%;" class="text-left"> 
                        <p> <b>Payment Method:</b> 
                            @if ($order->transactions->mode  == 'cod')
                                Cash On Delivery
                            @elseif($order->transactions->mode  == 'card')
                                Credit Card
                            @else
                                M-Pesa. 
                            @endif
                            <br> </p>
                            <p><b>Shipping Method:</b> Rider </p>
                            <p><b>Status: </b> {{ $order->transactions->status }}</p>
                        </td>
                </tbody>
            </table>


            {{-- Shiping and delivery table --}}
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            <p>Order By: {{ $order->name }} <br></p>
                            <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a> <br></p>
                            <p>Phone: <a href="tel:+254{{ $order->mobile }}">{{ $order->mobile }}</a> 
                                @if ($order->other_phone == NULL)
                                @else
                                    OR {{ $order->other_phone }} <br>
                                @endif </p>
                            <p>Location: {{ $order->location }} <br></p>
                            <p>Country: {{ $order->country }} <br></p>
                        </td>

                        @if ($order->is_shipping_different)
                            <td class="text-left">
                                <p>Deliver To: {{ $order->shippings->name }} <br></p>
                                <p>Email: <a href="mailto:{{ $order->shippings->email }}">{{ $order->email }}</a> <br></p>
                                <p>Phone: <a href="tel:+254{{ $order->shippings->mobile }}">{{ $order->mobile }}</a> 
                                    @if ($order->shippings->other_phone == NULL)
                                    @else
                                        OR {{ $order->shippings->other_phone }} <br>
                                    @endif </p>
                                <p>Location: {{ $order->shippings->location }} <br></p>
                                <p>Country: {{ $order->shippings->country }} <br></p>
                            </td>
                        @else 
                        <td>
                            Ship to the details on the right 
                        </td>
                        @endif

                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-left">Image</td>
                            <td class="text-left">Name</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Price</td>
                            <td class="text-right">Total</td>
                            <td style="width: 20px;"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>
                                    <img class="img-thumbnail" width="70px" src="{{ asset('assets/image/product/products/'.$item->products->image) }}" alt="{{ $item->products->name }}">
                                </td>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Ksh. {{ $item->price }}</td>
                                <td>Ksh. {{ (($item->quantity)*($item->price)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Sub-Total</b>
                            </td>
                            <td class="text-right">Ksh. {{ $order->subtotal }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Flat Shipping Rate</b>
                            </td>
                            <td class="text-right">Free Delivery</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>VAT ({{ config('cart.tax') }}%)</b>
                            </td>
                            <td class="text-right">Ksh. {{ $order->tax }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Total</b>
                            </td>
                            <td class="text-right">Ksh. {{ $order->total }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <h3>Order History</h3>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Date Added</td>
                        <td class="text-left">Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">20/06/2016</td>
                        <td class="text-left">Processing</td>
                    </tr>
                    <tr>
                        <td class="text-left">21/06/2016</td>
                        <td class="text-left">Shipped</td>
                    </tr>
                    <tr>
                        <td class="text-left">24/06/2016</td>
                        <td class="text-left">Complete</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Middle Part End-->
    </div>
</div>