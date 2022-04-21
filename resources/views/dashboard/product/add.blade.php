@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
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
                        <form action="dashboard/product/add" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Brands Parent</label>
                                <select class="form-control" name="brand">
                                    <option value="0">Please Choose Brands</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->id}}.{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Category Parent</label>
                                <select class="form-control" name="productCategory">
                                    <option value="0">Please Choose Product Category</option>
                                    @foreach($productCategories as $productCategory)
                                        <option value="{{$productCategory->id}}">{{$productCategory->id}}.{{$productCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" rows="3" name="txtDescription"></input>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <input class="form-control" name="txtContent" placeholder="Please Enter Content"></input>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" />
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control" name="txtDiscount" placeholder="Please Enter Discount" />
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input class="form-control" name="txtWeight" placeholder="Please Enter Weight" />
                            </div>
                            <div class="form-group">
                                <label>Sku</label>
                                <input class="form-control" name="txtSku" placeholder="Please Enter Sku" />
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input class="form-control" name="txtTag" placeholder="Please Enter Tag" />
                            </div>
                            <div class="form-group">
                                <label>Featured</label>
                                <label class="radio-inline">
                                    <input name="rdoFeatured" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoFeatured" value="0" type="radio">Invisible
                                </label>
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