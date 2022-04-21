@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$product->name}}
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
                        @if (session('message'))
                            <div class="alert alert-success">                                    
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="dashboard/product/edit/{{$product->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Brands Parent</label>
                                <select class="form-control" name="brand">
                                    <option value="0">Please Choose Brands</option>
                                    @foreach($brands as $brand)
                                        <option 
                                        @if($product->brand->id == $brand->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Category Parent</label>
                                <select class="form-control" name="productCategory">
                                    <option value="0">Please Choose Product Category</option>
                                    @foreach($productCategories as $productCategory)
                                        <option
                                        @if($product->productCategory->id == $productCategory->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Name"  value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="txtDescription">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <input class="form-control" name="txtContent" value="{{$product->content}}"></input>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{$product->price}}"/>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control" name="txtDiscount" placeholder="Please Enter Discount" value="{{$product->discount}}"/>
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input class="form-control" name="txtWeight" placeholder="Please Enter Weight" value="{{$product->weight}}"/>
                            </div>
                            <div class="form-group">
                                <label>Sku</label>
                                <input class="form-control" name="txtSku" placeholder="Please Enter Sku" value="{{$product->sku}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input class="form-control" name="txtTag" placeholder="Please Enter Tag" value="{{$product->tag}}"/>
                            </div>
                            <div class="form-group">
                                <label>Featured</label>
                                <label class="radio-inline">
                                    <input 
                                    @if($product->featured == 1)
                                        {{"checked"}}
                                    @endif
                                    name="rdoFeatured" value="1" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input
                                    @if($product->featured == 0)
                                        {{"checked"}}
                                    @endif
                                    name="rdoFeatured" value="0" type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Comment
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>Product</tr>
                            <tr align="center">
                                <th>ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Rating</th>
                                <th>Time</th>
                                
                                <th>Delete</th>
                                {{-- <th>Edit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{$product->id}}.{{$product->name}}:
                            </tr>
                            @foreach($product->productComments as $productComment)
                            <tr class="odd gradeX" align="center">
                                <td>{{$productComment->id}}</td>
                                <td>
                                    {{$productComment->user->id ?? ' '}}{{$productComment->user->name ?? $productComment->name}}
                                </td>
                                <td>
                                    {{$productComment->user->email ?? $productComment->email}}
                                </td>
                                <td>
                                    {{$productComment->user->name ?? $productComment->name}}
                                </td>
                                
                                
                                <td>{{$productComment->messages}}</td>
                                <td>{{$productComment->rating}}</td>

                                <td>{{$productComment->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/productComment/delete/{{$productComment->id}}/{{$product->id}}"> Delete</a></td>
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/product/edit/{{$product->id}}">Edit</a></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection