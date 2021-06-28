@section('title', 'COUPONS')

<main id="content" class="page-main container">
    <!-- Block Spotlight1  -->
    <div class="so-spotlight1 ">
        <div class="container">
            @if (Session::has('message'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                <p class="text-center">{{ Session::get('message') }}</p>
            </div>
            @endif
           <div class="panel">
               <div class="panel-header">
                    <div class="col-sm-6">
                        <h3 class="card-title text-uppercase">All Coupons</h3>
                    </div>
                    <div class="col-sm-6">
                    <a href="{{ route('admin.addcoupon') }}" class="btn btn-warning pull-right px-5 m-5"> 
                        <i class="fa fa-plus"></i> New Coupon
                    </a>
                    </div>
               </div>
               <div class="panel-body">
                     <div class="row">
                         <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <td class="text-left">#</td>
                                     <td class="text-left">Coupon Code</td>
                                     <td class="text-left">Coupon Value/Type</td>
                                     <td class="text-left">Cart Value</td>
                                     <td class="text-left">Expiry Date</td>
                                     <td class="text-left">Created By</td>
                                     <td class="text-left" colspan="2">Action</td>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($coupons as $key=>$coupon)
                                 <tr>
                                    <td class="text-left">{{ $key + 1 }}</td>
                                    <td class="text-left">{{ $coupon->code }}</td>
                                    <td class="text-left">
                                           @if ($coupon->type == 'fixed')
                                               Ksh. {{ $coupon->value }}  
                                           @else
                                               {{ $coupon->value }} %
                                           @endif
                                    </td>
                                    <td class="text-left">Ksh. {{ $coupon->cart_value }}</td>
                                    <td  class="text-left">{{ date('l M d, Y', strtotime($coupon->expiry_date)) }}</td>
                                    <td class="text-left">{{ $coupon->users->name }}</td>
                                    <td class="text-left">
                                        <a href="{{ route('admin.editcoupon', $coupon->id) }}" 
                                           class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                       <a href="#" onclick="confirm('Are you sure you want to delete this category?') || 
                                           event.stopImmediatePropagation()" 
                                           wire:click.prevent="deleteCoupon({{ $coupon->id }})"
                                           class="btn btn-danger btn-sm">
                                           <i class="fa fa-trash"></i>
                                           </a>
                                    </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         {{-- {{ $categories->links() }} --}}
                     </div>
               </div>
           </div>
        </div>
    </div>
</main>
