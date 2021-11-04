
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Attribute</h4>
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
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="card">
                  <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/add-attributes/'.$productDetails->id) }}" method="post" name="add_product" id="add-product"> {{csrf_field()}}
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
                                                    <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;" required/>
                                                    <input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px;" required/>
                                                    <input type="number" name="price[]" id="price" placeholder="Price" style="width: 120px;" required/>
                                                    <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px;" required/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field"> <i class="fas fa-plus btn-outline-success btn-sm"></i></a>
                                                </div>
                                            </div> 
                                           </div>
                                            
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <input type="submit" class="btn btn-primary" value="Add Attributes">
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
                        <h5 class="card-title">View Product Attributes</h5>
                        <div class="table-responsive">
                            <form method="post" action="{{ url('/admin/edit-attributes/'.$productDetails->id) }}" > {{ csrf_field() }}
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>SKU</th>
                                            <th>Size</th>
                                            <th>Price</th> 
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productDetails['attributes'] as $attribute)
                                        <tr>
                                            <td><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}"> {{ $attribute->id }}</td>
                                            <td>{{ $attribute->sku }}</td>
                                            <td>{{ $attribute->size }} </td>
                                            <td><input type="tect" name="price[]" value="{{ $attribute->price }}"> </td>
                                            <td><input type="text" name="stock[]" value="{{ $attribute->stock }}"> </td>
                                            <td>
                                                <a><input type="submit" value="update" class="btn btn-outline-success btn-sm"></a>
                                                <a rel="{{ $attribute->id }}" rel1="delete-attribute" class="btn btn-outline-danger btn-sm deleteRecord" href="javascript:" ><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
            </div>

@endsection