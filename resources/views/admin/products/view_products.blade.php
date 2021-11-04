
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Product</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                    <h5 class="card-title">All Produts</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product code</th>
                                    <th>Product color</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_code}}</td>
                                    <td>{{$product->product_color}}</td>
                                    <td>{{$product->price}}$</td>
                                    <td style="padding: 1px;"><img src="{{ asset('img/products/small/'.$product->image) }}" alt="" style="width:80px;"></td>
                                    <td>@if($product->featured==1) Yes @else NO @endif</td>
                                    <td style="min-width: 180px!important"> 
                                        <a class="btn btn-outline-primary btn-sm" href="{{ url('/admin/edit-product/'.$product->id) }}" title="Edit Product"><em class="far fa-edit"></em></a>
                                        <a class="btn btn-outline-success btn-sm" href="{{ url('/admin/add-attributes/'.$product->id) }}" title="Add Attributes"><em class="fas fa-plus"></em></a>
                                        <a class="btn btn-outline-warning btn-sm" href="{{ url('/admin/add-images/'.$product->id) }}" title="Add Images">
                                            <em class="fa fa-camera-retro"></em></a>
                                        <span>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#Modal{{$product->id}}" title="View Details">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                                                <div class="modal-dialog" role="document ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Details of: {{$product->product_name}} </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true ">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Product Id:{{$product->id}}</p>
                                                                    <p>Product Name: {{$product->product_name}}</p>
                                                                    <p>Product Category: {{$product->category_name}} </p>
                                                                    <p>Product Color: {{$product->product_code}}</p>
                                                                    <p>Product Code: {{$product->product_code}}</p>
                                                                    <p>Price: {{$product->price}}$</p>
                                                                    <p>Description: </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>
                                                                        Product Image: <br>
                                                                        <img src="{{ asset('img/products/medium/'.$product->image) }}" alt="" style="width: 100%;" >
                                                                        </p>
                                                                </div>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        <a class="btn btn-outline-danger btn-sm deleteRecord"<?php /* href="{{ url('/admin/delete-product/'.$product->id) }}" */?> rel="{{$product->id}}" rel1="delete-product" title="Delete Product" href="javascript:" ><i class="far fa-trash-alt"></i></a>
                                    </td> 
                                

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product code</th>
                                    <th>Product color</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Featured</th>
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