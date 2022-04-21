@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Image
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
                                <th>Image</th>
                                <th>Path</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productImages as $productImage)
                            <tr class="odd gradeX" align="center">
                                <td>{{$productImage->id}}</td>
                                <td>{{$productImage->product->id}}-{{$productImage->product->name}}</td> 
                                <td>
                                    <img style="width: 100px;
                                    "src="front/img/products/{{$productImage->path}}" alt="">
                                </td>
                                <td>{{$productImage->path}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/productImage/delete/{{$productImage->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/productImage/edit/{{$productImage->id}}">Edit</a></td>
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