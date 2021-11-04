@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            @if(Session::has('flash_massage_success_reset'))  
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_massage_success_reset') !!}</strong>
                </div>
            @endif
            <div class="col-sm-4 col-sm-offset-1">
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
                    <form action="{{ url('/user-login') }}" method="POST" name="userLogin" id="userLogin">
                        {{ csrf_field() }}
                        <input id="email" name="email" type="text" placeholder="Email Address" />
                        <input id="password" name="password" type="password" placeholder="Password" />

                        <button type="submit" class="btn btn-default">Login</button><br>
                    </form>
                    <a href="{{ url('forgot-password') }}">Forgot Password?</a>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    
                    <h2>New User Signup!</h2>
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
                    <form id="registerForm" name="registerForm" method="POST" action="{{ url('/user-register') }}">
                        {{ csrf_field() }}
                        <input id="name" name="name" type="text" placeholder="Name"/>
                        <input id="email" name="email" type="email" placeholder="Email Address"/>
                        <input id="password" name="password" type="password" placeholder="Password"/>
                        <button  type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection
