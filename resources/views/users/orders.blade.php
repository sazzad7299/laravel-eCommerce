@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <h2>Order#</h2>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Codes</th>
                            <th>Payment Method</th>
                            <th>Grand Total</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>@foreach ($order->orders as $pro) {{ $pro->product_code }} <br> @endforeach</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ url('/myaccount/orders/'.$order->id) }}">View</a></td>
                        </tr>
                        
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>ordered Product</th>
                            <th>Payment Method</th>
                            <th>Grand Total</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection
