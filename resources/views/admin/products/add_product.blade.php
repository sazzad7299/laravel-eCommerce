
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
                        <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/add-product') }}" method="post" name="add_product" id="add-product"> {{csrf_field()}}
                           <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product  Name:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="product_name" id="product_name" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product  Code:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="product_code" id="product_code" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product  Color:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="product_color" id="product_color" required="true">
                                                </div>
                                            </div>
                                            {{-- Laravel texteditor --}}
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="description" id="description" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="care" class="col-sm-3 text-right control-label col-form-label">Materials & Care:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="care" id="care" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Amount:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="price" id="price" required="true">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card">

                                        <div class="card-body">
                                           <div class="form-group row">
                                                <h4 class="card-title mr-auto text-right">Category:</h4>
                                                <div>
                                                    <select name="category_id" class="form-control" id="category_id">
                                                        <?php echo $categories_dropdown;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h4 class="card-title mr-auto">Upload Image:</h4>
                                                <div class="col-md-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-label" id="validatedCustomFile" name="image" id="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Enable:</label>
                                                <div class="col-sm-9">
                                                    <input class="mt-2" type="checkbox"  name="status" id="status" value="1">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Featured:</label>
                                                <div class="col-sm-9">
                                                    <input class="mt-2" type="checkbox"  name="featured" id="featured" value="1">
                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <input type="submit" class="btn btn-primary" value="Add Product">
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