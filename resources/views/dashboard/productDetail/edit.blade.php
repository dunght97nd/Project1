@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Detail ID: {{$productDetail->id}}
                            <small>Edit</small>
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
                        <form action="dashboard/productDetail/edit/{{$productDetail->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Products Parent</label>
                                <select class="form-control" name="product">
                                    <option value="0">Please Choose Products</option>
                                    @foreach($products as $product)
                                        <option 
                                        @if($productDetail->product->id == $product->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$product->id}}">{{$product->id}}.{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Color Parent</label>
                                <select class="form-control" name="color">
                                    <option value="0">Please Choose Color</option>
                                    <option
                                    @if($productDetail->color == 'black')
                                        {{"selected"}}
                                    @endif
                                    value="black">Black</option>
                                    <option
                                    @if($productDetail->color == 'violet')
                                        {{"selected"}}
                                    @endif
                                    value="violet">Violet</option>
                                    <option
                                    @if($productDetail->color == 'blue')
                                        {{"selected"}}
                                    @endif
                                    value="blue">Blue</option>
                                    <option
                                    @if($productDetail->color == 'yellow')
                                        {{"selected"}}
                                    @endif
                                    value="yellow">Yellow</option>
                                    <option
                                    @if($productDetail->color == 'green')
                                        {{"selected"}}
                                    @endif
                                    value="green">Green</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size Parent</label>
                                <select class="form-control" name="size">
                                    <option value="">Please Choose Size</option>
                                    <option 
                                    @if($productDetail->size == 's')
                                        {{"selected"}}
                                    @endif
                                    value="s">S</option>
                                    <option 
                                    @if($productDetail->size == 'm')
                                        {{"selected"}}
                                    @endif
                                    value="m">M</option>
                                    <option 
                                    @if($productDetail->size == 'l')
                                        {{"selected"}}
                                    @endif
                                    value="l">L</option>
                                    <option 
                                    @if($productDetail->size == 'xs')
                                        {{"selected"}}
                                    @endif
                                    value="xs">XS</option>
                                    <option 
                                    @if($productDetail->size == '38')
                                        {{"selected"}}
                                    @endif
                                    value="38">38</option>
                                    <option 
                                    @if($productDetail->size == '39')
                                        {{"selected"}}
                                    @endif
                                    value="39">39</option>
                                    <option 
                                    @if($productDetail->size == '40')
                                        {{"selected"}}
                                    @endif
                                    value="40">40</option>
                                    <option 
                                    @if($productDetail->size == '41')
                                        {{"selected"}}
                                    @endif
                                    value="41">41</option>
                                    <option 
                                    @if($productDetail->size == '42')
                                        {{"selected"}}
                                    @endif
                                    value="42">42</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="txtQty" placeholder="Please Enter Quantity" value="{{$productDetail->qty}}" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Edit</button>
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