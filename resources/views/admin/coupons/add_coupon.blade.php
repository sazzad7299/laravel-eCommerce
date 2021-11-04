
@extends('layouts.adminLayout.admin_design')



@section('content')
<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Coupons</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
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
                        <form  class="form-horizontal" action="{{ url('/admin/add-coupon') }}" method="post" name="add_coupon" id="add-coupon"> {{csrf_field()}}
                           <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Coupon Code:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code"  minlength="5" maxlength="15" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Amount:</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="amount" id="amount" min="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Persentages:</label>
                                                <div class="col-sm-9">
                                                    <select name="amount_type" class="form-control" id="amount_type">
                                                        <option value="percentage">Percentage</option>
                                                        <option value="fixed">Fixed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Expiry Date:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="expiry_date" id="expiry_date" required="true" autocomplete="off">
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
                                                    <input type="submit" class="btn btn-primary" value="Add Coupon">
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