@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">
    <div class="row">
        <div class="com-md-12">
            <div class="col-md-6" align="center">
                <h2> <strong>Thanks!</strong>Your Order has been Placed</h2>
                <p>Your order number is {{Session::get('order_id')}} Total payable amount is {{ Session::get('grand_total') }}TK</p>
            </div>
        </div>
        
    </div>
</div>
@endsection
<?php
    Session::forget('order_id');
    Session::forget('grand_total');
?>