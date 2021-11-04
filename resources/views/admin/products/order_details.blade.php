@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Order #{{ $orderDetails->id }}</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{url('admin/view-orders') }}">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                    @endif   
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                    @endif
                    <h4 class="card-title">Order Details</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td class="font-medium">Order Date</td>
                            <td align="center">{{ $orderDetails->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Order Status</td>
                            <td align="center">
                                <span class="dropdown">
                                <button class="btn btn-primary dropdown-toggle btn" type="button" data-toggle="dropdown">{{ucfirst($orderDetails->order_status)}}
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a style="margin: 0px;padding:3px 5px;font-size:18px;color:black" href="/admin/order-details/{{$orderDetails->id}}/pending">Pending</a></li>
                                    <li><a style="margin: 0px;padding:3px 5px;font-size:18px;color:black" href="/admin/order-details/{{$orderDetails->id}}/processing">Processing</a></li>
                                    <li><a style="margin: 0px;padding:3px 5px;font-size:18px;color:black" href="/admin/order-details/{{$orderDetails->id}}/shipped">Shipped</a></li>

                                    <li><a style="margin: 0px;padding:3px 5px;font-size:18px;color:black" href="/admin/order-details/{{$orderDetails->id}}/completed">Completed</a></li>
                                </ul>
                            </span></td>
                        </tr>
                        <tr>
                            <td class="font-medium">Coupon Code</td>
                            <td align="center">@if(empty($orderDetails->coupon_code)) NO @else{{ $orderDetails->coupon_code }}@endif</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Coupon Amount</td>
                            <td align="center">{{ $orderDetails->coupon_amount }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Shipping Charge</td>
                            <td align="center">{{ $orderDetails->shipping_charges }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Total Coast</td>
                            <td align="center">{{ $orderDetails->grand_total }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Payment Method</td>
                            <td align="center">{{ $orderDetails->payment_method }}</td>
                        </tr>
                        
                    </tbody>

                </table>
                
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Details</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td class="font-medium">Customer Name</td>
                            <td align="center">{{ $orderDetails->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Customer Email</td>
                            <td align="center">{{ $orderDetails->user_email }}</td>
                        </tr>
                    </tbody>

                </table>
                
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipping Details</h4>
                </div>
                <div class="card-body">
                    <p>Name:{{ $orderDetails->name }}</p>
                    <p>Email:{{ $orderDetails->user_email }}</p>
                    <p>Country:{{ $orderDetails->address }}</p>
                    <p>City:{{ $orderDetails->city }}</p>
                    <p>State:{{ $orderDetails->state }}</p>
                    <p>Pincode:{{ $orderDetails->postcode }}</p>
                    <p>Country:{{ $orderDetails->country }}</p>
                </div>               
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Billing Details</h4>
                </div>
                <div class="card-body">
                    <p>Name:{{ $userDetails->name }}</p>
                    <p>Email:{{ $userDetails->email }}</p>
                    <p>Country:{{ $userDetails->address }}</p>
                    <p>City:{{ $userDetails->city }}</p>
                    <p>State:{{ $userDetails->state }}</p>
                    <p>Pincode:{{ $userDetails->postcode }}</p>
                    <p>Country:{{ $userDetails->country }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <th class="font-medium">Product Name</th>
            <th class="font-medium">Product Code</th>
            <th class="font-medium">Product Size</th>
            <th class="font-medium">Product Color</th>
            <th class="font-medium">Product price</th>
            <th class="font-medium">Product Quantity</th>
            <th class="font-medium">Total</th>
            
        </thead>
        <tbody>
            @foreach ($orderDetails->orders as $pro)
            <tr>
                <td>{{ $pro->product_name }}</td>
                <td>{{ $pro->product_code }}</td>
                <td>{{ $pro->product_size}}</td>
                <td>{{ $pro->product_color }}</td>
                <td>{{ $pro->product_price }} tk</td>
                <td>{{ $pro->product_qty }}</td>
                <td>{{ $pro->product_price*$pro->product_qty }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    </div>
    </div>    
</div>   
@endsection
