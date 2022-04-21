@extends('front.layout.master')

@section('title','Login')

@section('body')
<!-- Breadcrumb section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb section end -->

    <!-- Login section start -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Register</h2>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">                                    
                                {{session('success')}}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">                                    
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="/register" method="POST">
                        @csrf
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input required type="email" name="email" id="username">
                            </div>
                            <div class="group-input">
                                <label for="username">Your Name *</label>
                                <input required type="text" name="name" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input required type="password" name="password" id="pass">
                            </div>
                            <div class="group-input">
                                <label for="pass">Confirm Password *</label>
                                <input required type="password" name="passwordRe" id="pass">
                            </div>
                            
                            <button type="submit" class="site-btn register-btn">Register</button>
                        </form>
                        <div class="switch-login">
                            <a href="login" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login section end -->
@endsection