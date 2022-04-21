@extends('front.layout.master')

@section('title','Password')

@section('body')
<!-- Breadcrumb section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="user"></i> User</a>
                        <span>Edit Password</span>
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
                        <h2>Change Password</h2>
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
                        <form action="user/editPassword" method="POST">
                            @csrf
                            <input type="hidden" value="{{Auth()->user()->id}}">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" name="email" id="username" readonly="" value="{{Auth()->user()->email}}">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password Old *</label>
                                <input type="password" name="passwordOld" id="pass">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password New *</label>
                                <input type="password" name="passwordNew" id="pass">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password New *</label>
                                <input type="password" name="passwordNewRe" id="pass">
                            </div>
                            <!-- <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" name="" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div> -->
                            <button type="submit" class="site-btn login-btn">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login section end -->
    @endsection