@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Pay Amount</th>
                            <th>Order Status</th>
                            <th>Payment Method</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->user_email }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ url('/admin/order-details/'.$order->id) }}">View</a></td>
                        </tr>
                        
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Pay Amount</th>
                            <th>Order Status</th>
                            <th>Payment Method</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
