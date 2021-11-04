
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-category/'.$categoryDetails->id) }}" name="add_category" id="add_category">
                            	{{csrf_field()}}
                                <div class="card-body">
                                    <h4 class="card-title">Edit Category</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="name" required="true" value="{{$categoryDetails->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Update Parents:</label>
                                        <div class="col-sm-9">
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="0">Main Category</option>
                                                @foreach($levels as $val)
                                                <option value="{{$val->id}}"  @if($val->id == $categoryDetails->parent_id)
                                                selected
                                                @endif>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="description" id="description" required="true">{{$categoryDetails->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="url" id="url" required="true" value="{{$categoryDetails->url}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="enable" class="col-sm-3 text-right control-label col-form-label">Enable</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox"  name="status" id="status" @if($categoryDetails->status == "1") checked @endif value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-info" value="Update Category">
                                    </div>
                                </div>
                            </form>
                        </div>
    

                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
@endsection