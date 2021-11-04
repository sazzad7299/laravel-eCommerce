@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Review Products</li>
        </ol>
    </div>
    <div class="p-t-20">
        @if(Session::has('flash_message_success'))  
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_error_message'))  
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_error_message') !!}</strong>
            </div>
        @endif
    </div>
        <div class="col-md-6 col-sm-6">
            <h2>Billing To</h2>
                <div class="form-group">
                    <input type="text" name="billing_name" id="billing_name" class="form-control" value="{{ $userDetails->name }}" placeholder="Billing Address">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_address" id="billing_address" class="form-control" value="{{ $userDetails->address }}" placeholder="Billing Address">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_city" id="billing_city" class="form-control" value="{{ $userDetails->city }}" placeholder="Billing City">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_state" id="billing_state" class="form-control" value="{{ $userDetails->state }}" placeholder="Billing state">
                </div>
                <div class="form-group">
                <input type="text" value="{{$userDetails->country}}" class="form-control">
            </div>
                <div class="form-group">
                    <input type="text" name="billing_postcode" id="billing_postcode" class="form-control"value="{{ $userDetails->postcode }}" placeholder="Billing postcode">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_mobile" id="billing_mobile" class="form-control" value="{{ $userDetails->mobile  }}" placeholder="Billing mobile ">
                </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <h2>Shipping To</h2>
            <div class="form-group">
                <input type="text" name="shipping_name" id="shipping_name" class="form-control" placeholder="shipping Name" value="{{ $shippingDetails->name }}">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_address" id="shipping_address"value="{{ $shippingDetails->address }}" class="form-control" placeholder="shipping Address">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_city" id="shipping_city" value="{{ $shippingDetails->city }}"class="form-control" placeholder="shipping City">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_state" id="shipping_state" value="{{ $shippingDetails->state }}"class="form-control" placeholder="shipping state">
            </div>
            <div class="form-group">
                <input type="text" value="{{$shippingDetails->country}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_postcode" id="shipping_postcode" value="{{ $shippingDetails->postcode }}" class="form-control" placeholder="shipping postcode">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_mobile" id="shipping_mobile" value="{{ $shippingDetails->mobile }}" class="form-control"  placeholder="shipping mobile ">
            </div>
        </div>
    <section id="cart_items">
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_amount=0;?>
                    @foreach ($userCart as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('img/products/small/'.$cart->image)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart->product_name }}</a></h4>
                            <p>{{ $cart->product_code }} | {{ $cart->product_color }} | {{ $cart->size }}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{ $cart->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ asset('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2" disabled>
                                @if ($cart->quantity>1)
                                <a class="cart_quantity_down" href="{{ asset('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
                                @endif
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $cart->price*$cart->quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete deleteRecord"<?php /* href="{{ url('/cart/delete-product/'.$cart->id) }}" */?> rel="{{$cart->id}}" rel1="delete-product" title="Delete Product" href="javascript:" ><i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>  
                    <?php $total_amount=$total_amount + ($cart->price*$cart->quantity) ?>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                @if(!empty(Session::get('CouponAmount')))
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>$<?php echo $total_amount?></td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Discount Amount</td>
                                    <td>$<?php echo $get_discount= Session::get('CouponAmount'); ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>$<?php echo $grand_total= $total_amount-Session::get('CouponAmount');?></span></td>
                                </tr>
                                @else
                                <td>Cart  Total</td>
                                <td>$<?php echo $grand_total=$total_amount?></td>
                                @endif
                              
                                
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{ url('/place-order') }}" method="POST" name="paymentForm" id="paymentForm">
            {{ csrf_field() }}
            <input type="hidden" name="grand_total" value="{{ $grand_total }}">
            <input type="hidden" name="coupon_amount" value="get_discount">
            <div class="payment-options">
                <span>
                    <label><strong>Select Payment Method:</strong>
                </span>
                <span>
                    <label><input type="radio" name="payment_method" id="COD" value="COD"> <strong>COD</strong></label>
                </span>
                <span>
                    <label><input type="radio" name="payment_method" id="Paypal" value="Paypal"><strong>Paypal</strong> </label>
                </span>
                <span style="float: right">
                    <label for="">
                        <button  type="submit" class="btn btn-success" onclick=" return selectPaymentMethod()">Check Out</button>
                    </label>
                </span>
            </div>
        </form>
        
    </div>

</div>
@endsection