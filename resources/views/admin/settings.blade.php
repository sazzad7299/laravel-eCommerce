@extends('layouts.adminLayout.admin_design')

@section('content')
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Admin.Settings</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            
                            <div class="col-12">
                                <div class="form-group">
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
                            <form class="form-horizontal" method="post" action="{{ url('/admin/update_pwd') }}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <h4 class="card-title">Update Personal Info</h4>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="username" class="form-control"  value="{{ $adminDetails->username }}" readonly>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">Current Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="current_pwd" class="form-control" id="current_pwd" placeholder="Current Password"><span id="chkPWD"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="new_pwd" class="form-control" id="new_pwd" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">Confirm  Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-primary" value="Update Password">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ==================================
@endsection