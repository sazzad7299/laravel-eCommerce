@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Check out</li>
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
    <form action="{{ url('/checkout') }}" method="POST" name="checkoutForm">
        {{ csrf_field() }}
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
                <select id="billing_country" name="billing_country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->name }}" @if($country->name==$userDetails->country) selected @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                    <input type="text" name="billing_postcode" id="billing_postcode" class="form-control"value="{{ $userDetails->postcode }}" placeholder="Billing postcode">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_mobile" id="billing_mobile" class="form-control" value="{{ $userDetails->mobile  }}" placeholder="Billing mobile ">
                </div>
                <div class="form-check">
                    <label><input type="checkbox" id="billToship"> Shipping Address same as Billing Address</label>
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
                <select id="shipping_country" name="shipping_country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->name }}"@if($country->name==$shippingDetails->country) selected @endif >{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="shipping_postcode" id="shipping_postcode" value="{{ $shippingDetails->postcode }}" class="form-control" placeholder="shipping postcode">
            </div>
            <div class="form-group">
                <input type="text" name="shipping_mobile" id="shipping_mobile" value="{{ $shippingDetails->mobile }}" class="form-control"  placeholder="shipping mobile ">
            </div>
            <div class="form-group">
                <button  type="submit" class="btn btn-default">Check Out</button>
            </div>
        </div>
    </form>
</div>
@endsection