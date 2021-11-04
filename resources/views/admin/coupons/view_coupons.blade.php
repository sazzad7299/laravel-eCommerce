
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">All Coupons</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Coupons</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
            <!-- ============================================================== -->
            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Coupons</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Coupon Id</th>
                                                <th>Coupon Code</th>
                                                <th>Amount</th>
                                            
                                                <th>Created Date</th>
                                                <th>Expiry Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($coupons as $coupon)
                                            <tr>
                                                <td>{{$coupon->id}}</td>
                                                <td>{{$coupon->coupon_code}}</td>
                                                <td>
                                                    {{$coupon->amount}} @if($coupon->amount_type=="percentage") % @else $ @endif
                                                </td>
                                                
                                                <td>{{$coupon->created_at}}</td>
                                                <td>{{$coupon->expiry_date}}</td>
                                                <td>@if($coupon->status=="1") <span style="color: green">Active</span> @else <span style="color: rgb(194, 33, 4)">Deactive</span> @endif</td>
                                                <td style="min-width: 180px!important"> 
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ url('/admin/edit-coupon/'.$coupon->id) }}" title="Edit Coupon"><i class="far fa-edit"></i></a>
                                                    <a class="btn btn-outline-danger btn-sm deleteRecord" rel="{{$coupon->id}}" rel1="delete-coupon" title="Delete Coupon" href="javascript:" ><i class="far fa-trash-alt"></i></a>
                                    
                                                    
                                                </td> 
                                            

                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Coupon Id</th>
                                                <th>Coupon Code</th>
                                                <th>Amount</th>
                                                
                                                <th>Created Date</th>
                                                <th>Expiry Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

@endsection