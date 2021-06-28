@section('title', 'LOGIN')
<x-guest-layout>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
        
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">
                
                    <div class="account-border">
                        <div class="row">
                            <div class="col-sm-6 new-customer">
                                <div class="well">
                                    <h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                </div>
                                <div class="bottom-form">
                                    <a href="{{ route('register') }}" class="btn btn-default pull-right">Continue</a>
                                </div>
                            </div>
                            
                            {{-- Validation Errors --}}
                            <x-jet-validation-errors class="mb-4" /> 

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="col-sm-6 customer-login">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
                                        <p><strong>I am a returning customer</strong></p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">E-Mail Address</label>
                                            <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label " for="input-password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="remember_me" class="control-label">
                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="bottom-form">
                                        <a href="{{ route('password.request') }}" class="forgot">Forgotten Password</a>
                                        <input type="submit" value="Login" class="btn btn-default pull-right" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>