@section('title', 'REGISTER')
<x-guest-layout>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
        
        <div class="row">
            <div id="content" class="col-sm-12">
                <h2 class="title">Register Account</h2>
                <p>If you already have an account with us, please login at the <a href="{{ route('login') }}">login page</a>.</p>
                <form action="{{ route('register') }}" method="post" class="form-horizontal account-register clearfix">
                    <x-jet-validation-errors class="mb-4" />
                    @csrf
                    <fieldset id="account">
                        <legend>Your Personal Details</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">Your Nice Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" :value="old('name')" placeholder="Your Nice Name" id="name" class="form-control" required autofocus autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="" placeholder="Your Nice email" id="email" class="form-control" :value="old('email')" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-fax">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password"  placeholder="Password" id="password" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-fax">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation"  placeholder="Password" id="password_confirmation" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Newsletter</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Subscribe</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="1" checked="checked"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="0"> No
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Terms and Conditions</b></a>
                            <input class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;
                            <input type="submit" value="Continue" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</x-guest-layout>