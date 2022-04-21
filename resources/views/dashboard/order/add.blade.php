@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            </div>
                        @endif
                            @if (session('message'))
                            <div class="alert alert-success">                                    
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="dashboard/order/add" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>User Parent</label>
                                <select class="form-control" name="user_id">
                                    <option value="0">Please Choose User</option>
                                    @foreach($users as $user)
                                    @if($user->level == 1)
                                        <option value="{{$user->id}}">{{$user->id}}.{{$user->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" name="first_name" placeholder="Please Enter First Name" required/>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" rows="3" name="last_name" placeholder="Please Enter Last Name" required></input>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" name="company_name" placeholder="Please Enter Company Name"></input>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input class="form-control" name="country" placeholder="Please Enter Country" required/>
                            </div>
                            <div class="form-group">
                                <label>Street Address</label>
                                <input class="form-control" name="street_address" placeholder="Please Enter Street Address" required/>
                            </div>
                            <div class="form-group">
                                <label>PostCode_ZIP</label>
                                <input class="form-control" name="postcode_zip" placeholder="Please Enter PostCode_ZIP" />
                            </div>
                            <div class="form-group">
                                <label>Town City</label>
                                <input class="form-control" name="town_city" placeholder="Please Enter Town City" required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" required/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Phone" required/>
                            </div>
                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input class="form-control" name="coupon_code" placeholder="Please Enter Coupon Code" />
                            </div>
                            {{-- <div class="form-group">
                                <label>Payment_Type</label>
                                <label class="radio-inline">
                                    <input name="payment_type" value="1" checked="" type="radio">Not Delivered
                                </label>
                                <label class="radio-inline">
                                    <input name="payment_type" value="2" type="radio">Delivered
                                </label>
                                <label class="radio-inline">
                                    <input name="payment_type" value="3" type="radio">Cancel Order
                                </label>
                            </div> --}}
                            <button type="submit" class="btn btn-default">Order Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection