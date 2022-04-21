@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Detail
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Sold</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productDetails as $productDetail)
                            <tr class="odd gradeX" align="center">
                                <td>{{$productDetail->id}}</td>
                                <td>{{$productDetail->product->id}}-{{$productDetail->product->name}}</td>
                                <td>{{$productDetail->color}}</td>
                                {{-- <td>
                                    {{$product->name}}
                                    <img style="width: 100px;
                                    "
                                    @if(count($product->productImages) > 0) 
                                    src="front/img/products/{{$product->productImages[0]->path}}"
                                    @endif alt="">
                                </td> --}}
                                <td>{{$productDetail->size}}</td>
                                <td>{{$productDetail->qty}}</td>
                                <td>{{$productDetail->sold}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/productDetail/delete/{{$productDetail->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/productDetail/edit/{{$productDetail->id}}">Edit</a></td>
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