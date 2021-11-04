
@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CMS PAGE</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update CMS</li>
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
                <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/edit-cms/'.$cmsPage->id)}}" method="post" name="add_cms" id="add_cms"> {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" id="title" required="true" value="{{ $cmsPage->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="url" id="url" required="true" value="{{ $cmsPage->url }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" id="description" required="true"  cols="30" rows="10" >{{ $cmsPage->description }}</textarea>
                                        </div>
                                    </div>
                                    {{-- Laravel texteditor --}}
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Enable:</label>
                                        <div class="col-sm-9">
                                            <input class="mt-2" type="checkbox"  name="status" id="status" @if($cmsPage->status == "1") checked @endif value="1">
                                        </div>
                                    </div>
                                    <div class="border-top" align="right">
                                        <div class="card-body">
                                            <input type="submit" class="btn btn-primary" value="Update CMS">
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