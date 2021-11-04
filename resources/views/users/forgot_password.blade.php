@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="login-form"><!--login form-->
                    <div class="p-t-20">
                        @if(Session::has('flash_login_massage_error'))  
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('flash_login_massage_error') !!}</strong>
                            </div>
                        @endif
                        @if(Session::has('1'))  
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{!! session('1') !!}</strong>
                            </div>
                        @endif
                    </div>
                    <h2>Login to your account</h2>
                    <form action="{{ url('forgot-password') }}" method="POST" name="forgotPassword" id="forgotPassword">
                        {{ csrf_field() }}
                        <input id="email" name="email" type="text" placeholder="Email Address" />
                        <button type="submit" class="btn btn-default">Forgot Password</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection
