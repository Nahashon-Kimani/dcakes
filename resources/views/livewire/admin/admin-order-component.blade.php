@section('title', 'ORDERS')

<main id="content" class="page-main container">
    <!-- Block Spotlight1  -->
    <div class="so-spotlight1 ">
        <div class="container">
           <div class="panel">
               <div class="panel-header">
                    <div class="col-sm-6">
                        <h3 class="card-title text-uppercase">All Orders</h3>
                    </div>
               </div>
               <div class="panel-body">
                     <div class="row">
                         <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <td class="text-left">Order Id</td>
                                     <td class="text-left">Subtotal</td>
                                     <td class="text-left">Discount</td>
                                     <td class="text-left">Total</td>
                                     <td class="text-left">Name</td>
                                     <td class="text-left">Mobile</td>
                                     <td class="text-left">Email</td>
                                     <td class="text-left">Location</td>
                                     <td class="text-left">Cake Ready By</td>
                                     <td class="text-left">Special Instruction</td>
                                     <td class="text-left">Order Date</td>
                                     <td class="text-left" colspan="2">Action</td>
                                 </tr>
                             </thead>

                             <tbody>
                                 @foreach ($orders as $key=>$order)
                                     <tr>
                                         <td>{{ $key + 1 }}</td>
                                         <td>Ksh. {{ $order->subtotal }}</td>
                                         <td>Ksh. {{ $order->discount }}</td>
                                         <td>Ksh. {{ $order->total }}</td>
                                         <td>{{ $order->name }}</td>
                                         <td>{{ $order->mobile }}</td>
                                         <td>{{ $order->email }}</td>
                                         <td>{{ $order->location }}</td>
                                         <td>{{ $order->ready_by }}</td>
                                         <td>{{ $order->special_instructions }}</td>
                                         <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                         <td>
                                             <a href="{{ route('admin.orderdetails', $order->id) }}" class="btn btn-success btn-sm pull-right">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                             
                         </table>
                     </div>
                     {{ $orders->links() }}
               </div>
           </div>
        </div>
    </div>
</main>
