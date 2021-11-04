

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
                                          <th>Banner ID</th>
                                          <th>Title</th>
                                          <th>Link</th>
                                          <th>Position</th>
                                          <th>Image</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($banners as $banner)
                                        <tr class="gradeX">
                                          <td class="center">{{ $banner->id }}</td>
                                          <td class="center">{{ $banner->title }}</td>
                                          <td class="center">{{ $banner->link }}</td>
                                          <td>
                                            @if($banner->position==0) Middle @endif
                                            @if($banner->position==1) TOP-LEFT @endif
                                            @if($banner->position==2) TOP-RIGHT @endif
                                            @if($banner->position==3) BUTTOM-LEFT @endif
                                            @if($banner->position==4) BUTTOM-RIGHT  @endif
                                            
                                          </td>
                                          <td class="center">
                                            @if(!empty($banner->image))
                                            <img src="{{ asset('/img/banners/'.$banner->image) }}" style="width:250px;">
                                            @endif
                                          </td>
                                          <td class="center">@if($banner->status==1) Active @else Inactive @endif</td>
                                          <td class="center">
                                            <a href="{{ url('/admin/edit-banner/'.$banner->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                                            <a id="delBanner" rel="{{ $banner->id }}" rel1="delete-banner" href="javascript:" <?php /* href="{{ url('/admin/delete-banner/'.$banner->id) }}" */ ?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Banner ID</th>
                                              <th>Title</th>
                                              <th>Link</th>
                                              <th>Image</th>
                                              <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

@endsection