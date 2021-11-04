<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-color: rgb(255, 255, 255)
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}
    </style>
</head>
<body>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a href="{{ url('/') }}"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a>
                <div class="float-right">
                    <h3 class="mb-0">Invoice #{{ $orderDetails->id }}</h3>
                    Date: 12 Jun,2019
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">Billing Details:</h5>
                        <h3 class="text-dark mb-1">{{ $userDetails->name }}</h3>
                        <div>{{ $userDetails->address }}</div>
                        <div>{{ $orderDetails->city }}, {{ $userDetails->state }}, {{ $userDetails->country }},{{ $userDetails->postcode }}</div>
                        <div>Email: {{ $userDetails->email }}</div>
                        <div>Phone: {{ $userDetails->mobile }}</div>
                    </div>
                    <div class="col-sm-6 ">
                        <h4 class="mb-3">Shipping Details:</h4>
                        <h3 class="text-dark mb-1">{{ $orderDetails->name }}</h3>
                        <div>{{ $orderDetails->address }}</div>
                        <div>{{ $orderDetails->city }}, {{ $orderDetails->state }}, {{ $orderDetails->country }},{{ $orderDetails->postcode }}</div>
                        <div>Email: {{ $orderDetails->user_email }}</div>
                        <div>Phone: {{ $orderDetails->mobile }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Color</th>
                                <th class="right">Price</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ $subtotal=0 }}
                            @foreach ($orderDetails->orders as $key=> $pro)
                            <tr>
                                <td class="center">{{ ++$key }}</td>
                                <td class="left strong">{{ $pro->product_name }}</td>
                                <td class="left">{{ $pro->product_color }}</td>
                                <td class="right">${{ $pro->product_price }}</td>
                                <td class="center">{{ $pro->product_qty }}</td>
                                <td class="right">${{$sub= $pro->product_price*$pro->product_qty }}</td>
                            </tr>
                            {{ $subtotal=$subtotal+$sub }}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                    <td class="right">${{ $subtotal }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Discount (20%)</strong>
                                    </td>
                                    <td class="right">${{ $orderDetails->coupon_amount }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Shipping Charges</strong>
                                    </td>
                                    <td class="right">${{ $orderDetails->shipping_charges }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong> </td>
                                    <td class="right">
                                        <strong class="text-dark">${{ $orderDetails->grand_total }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
                <button onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>