
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                        <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/add-banner') }}" method="post" name="add_banner" id="add-banner"> {{csrf_field()}}
                           <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
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

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Heading(h1):</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="title"  required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Text(p)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="link" id="link" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h4 class="card-title mr-auto">Upload Image:</h4>
                                                <div class="col-md-9">
                                                    <div class="custom-file">
                                                        <input name="image" id="image" type="file" size="19" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Text Position</label>
                                                <div class="col-sm-9">
                                                    <select name="position" id="position" class="form-control">
                                                        <option value="0" selected>MIDDLE</option>
                                                        <option value="1">TOP-LEFT</option>
                                                        <option value="2" >TOP-RIGHT</option>
                                                        <option value="3">BUTTOM-LEFT</option>
                                                        <option value="4" >BUTTOM-RIGHT</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Enable:</label>
                                                <div class="col-sm-9">
                                                    <input class="mt-2" type="checkbox"  name="status" id="status" value="1">
                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <input type="submit" class="btn btn-primary" value="Add Banner">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </form>   
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
@endsection