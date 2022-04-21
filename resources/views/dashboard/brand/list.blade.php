@extends('dashboard.layout.index')
@section('title','Dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brand
                            <small>List</small>
                        </h1>
                    </div>
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
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr class="odd gradeX" align="center">
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/brand/delete/{{$brand->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/brand/edit/{{$brand->id}}">Edit</a></td>
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