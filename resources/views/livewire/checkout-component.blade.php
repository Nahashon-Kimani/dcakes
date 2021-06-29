@section('title', 'CHECKOUT')


    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="/checkout">Checkout</a></li>
            
        </ul>
        
        <div class="row">
            <!--Middle Part Start-->
            <form wire:submit.prevent="placeOrder">
                <div id="content" class="col-sm-12">
                    <h2 class="title">Checkout</h2>
                    <div class="row">
                      <div class="col-sm-4">
      
                          {{-- Personal Details --}}
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                          </div>
                            <div class="panel-body">
                                  <fieldset id="account">
                                    <div class="form-group required">
                                      <label for="firstName" class="control-label">First Name</label>
                                      <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" wire:model="firstName">
                                      @error('firstName')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group required">
                                      <label for="input-payment-lastname" class="control-label">Last Name</label>
                                      <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" name="lastName" wire:model="lastName">
                                      @error('lastName')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group required">
                                      <label for="input-payment-email" class="control-label">E-Mail</label>
                                      <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail"  name="email"  wire:model="email">
                                      @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group required">
                                      <label for="input-payment-telephone" class="control-label">Telephone</label>
                                      <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" name="mobile"  wire:model="mobile">
                                      @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                      <label for="input-payment-Location" class="control-label">Location</label>
                                      <input type="text" class="form-control" id="input-payment-Location" placeholder="Location" name="location"  wire:model="location">
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
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" value="1" wire:model="shippingToDifferent">
                                        Ship to a different Person and Location.  </label>
                                    </div>
                                  </fieldset>
                                </div>
                        </div>
                        {{-- Personal details ends --}}
      
                        {{-- Shiping address --}}
                        @if ($shippingToDifferent)
                          <div class="panel panel-default">
                              <div class="panel-heading">
                              <h4 class="panel-title"><i class="fa fa-book"></i> Different Shipping Address</h4>
                              </div>
                              <div class="panel-body">
                                      <fieldset id="address" class="required">
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
                        {{-- End of shipping address --}}
      
                      </div>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                              </div>
                                <div class="panel-body">
                                  <p>Please select the preferred Shipping method to use on this order.</p>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" checked="checked" name="Free Shipping">
                                      Physical Picking Up</label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="Flat Shipping Rate">
                                      Sending a Rider</label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="Per Item Shipping Rate">
                                      Parcel Delivery</label>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                              </div>
                                <div class="panel-body">
                                    @error('paymentMode')<span class="text-danger">{{ $message }}</span>@enderror
                                  <p>Please select the preferred Payment method to use on this order.</p>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" checked="checked" value="cod" name="cod" wire:model="paymentMode">Cash On Delivery</label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" value="card" name="card" wire:model="paymentMode">Bank Transfer</label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" value="mpesa" name="mpesa" wire:model="paymentMode">M-Pesa</label>
                                  </div>
                                </div>
                            </div>
                          </div>
          
                       
                          <div class="col-sm-12">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                              </div>
                                <div class="panel-body">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <tfoot>
                                        <tr>
                                          <td class="text-right"><strong>Subtotals:</strong></td>
                                          <td class="text-right">Ksh. {{ Session::get('checkout')['subtotal'] }}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-right"><strong>Discount:</strong></td>
                                          <td class="text-right">{{ Session::get('checkout')['discount'] }}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-right"><strong>VAT ({{ config('cart.tax') }}%):</strong></td>
                                          <td class="text-right">Ksh. {{ Session::get('checkout')['tax'] }}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-right"><strong>Total:</strong></td>
                                          <td class="text-right">Ksh. {{ Session::get('checkout')['total'] }}</td>
                                        </tr>
                                      </tfoot>
                                    </table>
                                  </div>
                                </div>
                            </div>
                          </div>
      
                          <div class="col-sm-12">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-pencil"></i> Agree to Terms and Conditions of D-CAKES</h4>
                              </div>
                              <div class="panel-body">
                                  <label class="control-label" for="confirm_agree">
                                      <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                      <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>  
                                  <div class="buttons">
                                    <div class="pull-right">
                                      <input type="submit" class="btn btn-warning" id="button-confirm" value="Place Order">
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
        </div>
    </div>