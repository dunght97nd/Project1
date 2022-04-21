@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Detail
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
                        <form action="dashboard/productDetail/add" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Products Parent</label>
                                <select class="form-control" name="product">
                                    <option value="0">Please Choose Products</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->id}}.{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Color Parent</label>
                                <select class="form-control" name="color">
                                    <option value="0">Please Choose Color</option>
                                    <option value="black">Black</option>
                                    <option value="violet">Violet</option>
                                    <option value="blue">Blue</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="green">Green</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size Parent</label>
                                <select class="form-control" name="size">
                                    <option value="0">Please Choose Size</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="x">X</option>
                                    <option value="s">S</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="txtQty" placeholder="Please Enter Quantity" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Add</button>
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