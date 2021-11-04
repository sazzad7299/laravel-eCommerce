@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Product Size</th>
                            <th>Product Color</th>
                            <th>Product price</th>
                            <th>Product Quantity</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($orders as $order)
                        @foreach ($order->orders as $pro)
                        <tr>
                            <td> <a href="{{ url('/product/'.$pro->product_id) }}">{{$pro->product_name}}</a></td>
                            <td>{{ $pro->product_code }}</td>
                            <td>{{ $pro->product_size}}</td>
                            <td>{{ $pro->product_color }}</td>
                            <td>{{ $pro->product_price }} tk</td>
                            <td>{{ $pro->product_qty }}</td>
                            <td>{{ $pro->created_at }}</td>
                        </tr>
                        @endforeach
                        @endforeach
   
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Codes</th>
                            <th>Product Size</th>
                            <th>Product Color</th>
                            <th>Product price</th>
                            <th>Grand Quantity</th>
                            <th>Order Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection
