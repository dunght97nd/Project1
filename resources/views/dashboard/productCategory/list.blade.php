@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if (session('message'))
                        <div class="alert alert-success">                                    
                            {{session('message')}}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Banner</th>                                
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productCategories as $productCategory)
                            <tr class="odd gradeX" align="center">
                                <td>{{$productCategory->id}}</td>
                                <td>{{$productCategory->name}}</td>
                                <td><img style="width: 100px; "src="front/img/{{$productCategory->img}}" alt=""></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/productCategory/delete/{{$productCategory->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/productCategory/edit/{{$productCategory->id}}">Edit</a></td>
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