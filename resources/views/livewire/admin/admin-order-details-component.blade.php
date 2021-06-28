@section('title', 'ORDER DETAILS')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Order Infomation</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-10 col-sm-offset-1">
            <h2 class="title">Order Information</h2>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td colspan="2" class="text-left">Order Details</td>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td style="width: 50%;" class="text-left"> <b>Order ID:</b>{{ $order->id }}
                            <br>
                            <b>Date Added:</b> {{ $order->created_at->toFormattedDateString() }}</td>
                        <td style="width: 50%;" class="text-left"> <b>Payment Method:</b> {{ $order->transactions->mode }}
                            <br>
                            <b>Shipping Method:</b> Flat Shipping Rate </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">Jhone Cary
                            <br>Central Square
                            <br>22 Hoi Wing Road
                            <br>New Delhi
                            <br>India</td>
                        <td class="text-left">Jhone Cary
                            <br>Central Square
                            <br>22 Hoi Wing Road
                            <br>New Delhi
                            <br>India</td>
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
                        @foreach ($order->orderItems as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Sub-Total</b>
                            </td>
                            <td class="text-right">$101.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Flat Shipping Rate</b>
                            </td>
                            <td class="text-right">$5.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Eco Tax (-2.00)</b>
                            </td>
                            <td class="text-right">$6.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>VAT (20%)</b>
                            </td>
                            <td class="text-right">$21.20</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Total</b>
                            </td>
                            <td class="text-right">$133.20</td>
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
            <div class="buttons clearfix">
                <div class="pull-right"><a class="btn btn-primary" href="#">Continue</a>
                </div>
            </div>



        </div>
        <!--Middle Part End-->
    </div>
</div>