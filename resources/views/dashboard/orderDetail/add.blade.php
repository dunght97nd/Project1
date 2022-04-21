@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Details
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
                        <form action="dashboard/order/addOrderDetail/{{$orderId}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Order ID</label>
                                <input class="form-control" name="orderId" value="{{$orderId}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Product Parent</label>
                                <select class="form-control" name="productDetailId">
                                    <option value="0">Please Choose Product</option>
                                    @foreach($productDetails as $productDetail)
                                        <option 
                                            value="{{$productDetail->id}}">
                                            {{$productDetail->id}}.
                                            {{$productDetail->product->name}}-{{$productDetail->color}}-{{$productDetail->size}}.
                                            {{-- Price:${{$productDetail->product->price}}
                                            Discount: ${{$productDetail->product->discount}} --}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="qty" placeholder="Please Enter Quantity"></input>
                            </div>
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