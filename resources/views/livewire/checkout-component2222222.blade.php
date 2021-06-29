@section('title', 'CHECKOUT')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/checkout">Checkout</a></li>
        
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
       <form wire.submit.prevent="placeOrder">
          <div id="content" class="col-sm-12">
            <h2 class="title">Checkout</h2>
            <div class="row">
              <div class="col-sm-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                  </div>
                    <div class="panel-body">
                          <fieldset id="account">
                            <div class="form-group required">
                              <label for="input-payment-firstname" class="control-label">First Name</label>
                              <input type="text" class="form-control"  placeholder="First Name" name="firstName" wire:model="firstName">
                              @error('firstName')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-lastname" class="control-label">Last Name</label>
                              <input type="text" class="form-control"  placeholder="Last Name" name="lastName" wire:model="lastName">
                              @error('lastName')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-email" class="control-label">E-Mail</label>
                              <input type="text" class="form-control"  placeholder="E-Mail" name="email"  wire:model="email">
                              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-telephone" class="control-label">Telephone</label>
                              <input type="text" class="form-control"  placeholder="Telephone" name="mobile"  wire:model="mobile">
                              @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                              <label for="input-payment-fax" class="control-label">Location</label>
                              <input type="text" class="form-control"  placeholder="Location" name="location"  wire:model="location">
                              @error('location')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                              <label for="input-payment-fax" class="control-label">Special Instruction</label>
                              <textarea rows="4" class="form-control" id="confirm_comment" name="special_instruction" wire:model="special_instruction"></textarea>
                              @error('special_instruction')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                              <label for="input-payment-fax" class="control-label">Ready By </label>
                              <input type="date" class="form-control"  placeholder="{{ date('d M, Y') }}" name="ready_by"  wire:model="ready_by">
                              @error('ready_by')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                          </fieldset>
                        </div>
                </div>

                {{-- Checkbox for shipping different location --}}
                <div class="checkbox">
                  <label>
                    <input type="checkbox"  value="1" wire:model="shippingToDifferent">
                      Ship to a different location
                  </label>
                </div>

                
               
                  @if ($shippingToDifferent)
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                    </div>
                      <div class="panel-body">
                        <fieldset id="account">
                          <div class="form-group required">
                            <label for="input-payment-firstname" class="control-label">First Name</label>
                            <input type="text" class="form-control"  placeholder="First Name" name="firstName" wire:model="s_firstName">
                            @error('s_firstName')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-lastname" class="control-label">Last Name</label>
                            <input type="text" class="form-control"  placeholder="Last Name" name="lastName" wire:model="s_lastName">
                            @error('s_lastName')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-email" class="control-label">E-Mail</label>
                            <input type="text" class="form-control"  placeholder="E-Mail" name="email"  wire:model="s_email">
                            @error('s_email')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-telephone" class="control-label">Telephone</label>
                            <input type="text" class="form-control"  placeholder="Telephone" name="mobile"  wire:model="s_mobile">
                            @error('s_mobile')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group">
                            <label for="input-payment-fax" class="control-label">Location</label>
                            <input type="text" class="form-control"  placeholder="Location" name="location"  wire:model="s_location">
                            @error('s_location')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group">
                            <label for="input-payment-fax" class="control-label">Special Instruction</label>
                            <textarea rows="4" class="form-control" id="confirm_comment" name="special_instruction" wire:model="s_special_instruction"></textarea>
                            @error('s_special_instruction')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group">
                            <label for="input-payment-fax" class="control-label">Ready By </label>
                            <input type="date" class="form-control"  placeholder="{{ date('d M, Y') }}" name="ready_by"  wire:model="s_ready_by">
                            @error('s_ready_by')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                        </fieldset>
                      </div>
                  </div>
                  @endif
                {{-- Checkbox for shipping different location ends --}}


              </div>
              <div class="col-sm-8">
                <div class="row">
                  {{-- Delivery Method --}}
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-truck"></i> Payment Method</h4>
                      </div>
                        <div class="panel-body">
                          <p>Please select the preferred payment method to use on this order.</p>
                          @error('paymentMode')<span class="text-danger">{{ $message }}</span>@enderror

                          <div class="radio">
                            <label>
                              <input type="radio" checked="checked" name="Free Shipping" wire:model="paymentMode">
                              Cash On Delivery</label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Flat Shipping Rate" wire:model="paymentMode">
                              M-Pesa</label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Per Item Shipping Rate" wire:model="paymentMode"> 
                              Card </label>
                          </div>
                        </div>
                    </div>
                  </div>

                  {{-- Payment Method --}}
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                      </div>
                        <div class="panel-body">
                          <p>Please select the preferred payment method to use on this order.</p>
                          <div class="radio">
                            <label>
                              <input type="radio" checked="checked" name="Cash On Delivery">Cash On Delivery</label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Bank Transfer">Bank Transfer</label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Paypal">Paypal</label>
                          </div>
                        </div>
                    </div>
                  </div>

                
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Payments</h4>
                      </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              @if (Session::has('checkout'))
                                <tbody>
                                  <tr>
                                    <td class="text-right"><strong>Discount</strong></td>
                                    <td class="text-right">Ksh. {{ Session::get('checkout')['discount'] }}</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Sub-Total:</strong></td>
                                    <td class="text-right">Ksh. {{ Session::get('checkout')['subtotal'] }}</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>VAT({{ config('cart.tax') }})</strong></td>
                                    <td class="text-right">Ksh. {{ Session::get('checkout')['tax'] }}</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right">Ksh. {{ Session::get('checkout')['total'] }}</td>
                                  </tr>
                                </tbody>
                              @endif
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                          <br>
                          <div class="buttons">
                            <div class="pull-right">
                              <input type="submit" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </form>
        <!--Middle Part End -->
    </div>
</div>