
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Product Images</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>

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
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="card">
                  <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/add-images/'.$productDetails->id) }}" method="post" name="add_image" id="add-image"> {{csrf_field()}}
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        

                                        <div class="card-body">
                                            <table class=" table table-bordered">
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}" >
                                                        <label>Product  Name:</label>
                                                    </td>
                                                    <td>
                                                        <label for="fname" class="text-bold" style="font-weight: bold;color:rgb(235, 136, 22)">{{ $productDetails->product_name}}</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label f>Product  Code:</label>
                                                    </td>
                                                    <td>
                                                        <label style="font-weight: bold;color:rgb(17, 12, 7)">{{ $productDetails->product_code}}</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Product  Color:</label>
                                                    </td>
                                                    <td>
                                                        <label style="font-weight: bold;color:rgb(10, 7, 3)">{{ $productDetails->product_color}}</label>
                                                    </td>
                                                </tr>
                                            </table>                                         
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                           <div class="form-group row">
                                            <div class="field_wrapper">
                                                <div>
                                                    <div class="form-group row">
                                                        <h4 class="card-title mr-auto">Add Image:</h4>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-label" id="validatedCustomFile" name="image[]" id="image" multiple="multiple">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                           </div>
                                            
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <input type="submit" class="btn btn-primary" value="Add Images">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                           </div>
                         </form>
                </div>
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Images</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image ID</th>
                                        <th>Product Id</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productsImages as $image)
                                    <tr>
                                        <td>{{ $image->id }}</td>
                                        <td>{{ $image->product_id }}</td>
                                        <td><img src="{{ asset('img/products/small/'.$image->image) }}" alt="" style="width:80px;"></td>
                                        <td> 
                                            <a class="btn btn-outline-danger btn-sm deleteRecord"<?php /* href="{{ url('/admin/delete-image/'.$image->id) }}" */?> rel="{{$image->id}}" rel1="delete-alt-image" title="Delete Alternative Image" href="javascript:" ><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
            </div>

@endsection