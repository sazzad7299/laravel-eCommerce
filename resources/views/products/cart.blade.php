@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @if($cartCount > 0) 
        <div class="table-responsive cart_info">
            <div class="form-group">
                <div class="p-t-20">
                    @if(Session::has('flash_massage_error'))  
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{!! session('flash_massage_error') !!}</strong>
                        </div>
                    @endif
                    @if(Session::has('flash_massage_success'))  
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_massage_success') !!}</strong>
                    </div>
                    @endif
                </div>
            </div>
            
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
                </tbody>
            </table>
        </div>
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">          
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <form action="{{ url('/cart/apply-coupon') }}" method="post">
                            {{ csrf_field() }}
                            <label>Coupon Code:</label>
                            <input type="text" name="coupon_code">
                            <input type="submit" value="Apply" class="btn btn-default check_out" style="margin-top: 0px">
                            </form>
                        </li>      
                    </ul>
                </div>
            </div>         
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        @if(!empty(Session::get('CouponAmount')))
                        <li>Sub Total <span>$<?php echo $total_amount?></span></li>
                        <li>Coupon Discount <span>$<?php echo Session::get('CouponAmount'); ?></span></li>
                        <li>Grand Total <span>$<?php echo $total_amount-Session::get('CouponAmount');?></span></li>
                        @else
                        <li>Total <span>$<?php echo $total_amount?></span></li>
                        @endif
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        
    </div>
</section><!--/#do_action-->    
@endsection