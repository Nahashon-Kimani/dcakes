@section('title', 'THANK YOU')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('thankyou') }}">THANK YOU</a></li>
    </ul>

<div class="row">
    <!--Middle Part Start-->
        <div id="content" class="col-sm-12 text-center">
            <h2 class="text-center">Thank you {{ Auth::user()->name }} for your order</h2>
            <p>
                A confirmation email has been sent to YOU. 
                <br>
                A member of our team will get back to you sonnest possible.
            </p>

            <a href="/" class="btn btn-warning btn-sm text-center">Continue Shoping Here</a>

        </div>
</div>
</div>