@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    
                    <h2>Update Password!</h2>
                    <div class="p-t-20">
                        @if(Session::has('Update_massage_success'))  
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('Update_massage_success') !!}</strong>
                            </div>
                        @endif
                        @if(Session::has('Update_massage_error'))  
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('Update_massage_error') !!}</strong>
                            </div>
                        @endif
                    </div>
                    <form action="{{ url('/user/update-password') }}" method="POST" name="passwordUpdate" id="passwordUpdate">
                        {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="current_pwd" class="form-control" id="current_pwd" placeholder="Current Password"><span id="chkPWD"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="new_pwd" class="form-control" id="new_pwd" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Confirm  Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>   
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    
                    <h2>Update Personal info!</h2>
                    <div class="p-t-20">
                        @if(Session::has('flash_massage_success'))  
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('flash_massage_success') !!}</strong>
                            </div>
                        @endif
                        @if(Session::has('flash_massage_error'))  
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('flash_massage_error') !!}</strong>
                            </div>
                        @endif
                    </div>
                    <form id="accountForm" name="accountForm" method="POST" action="{{ url('/user/account') }}">
                        {{ csrf_field() }}
                        
                        <input id="name" name="name" type="text" value="{{ $userDetails->name }}" placeholder="Name"/>
                        <input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Address"/>
                        <input value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="City"/>
                        <input value="{{ $userDetails->state }}" id="state" name="state" type="text" placeholder="State"/>
                        <select id="country" name="country" style="height:40px;margin-bottom:10px">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->name }}" @if($country->name==$userDetails->country) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <input value="{{ $userDetails->postcode }}" id="postcode" name="postcode" type="text" placeholder="Post Code"/>
                        <input value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                        
                        <button  type="submit" class="btn btn-default">Update</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection
