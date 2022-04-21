@extends('dashboard.layout.index')
@section('title','Dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$brand->name}}
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
                        <form action="dashboard/brand/edit/{{$brand->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Brand Name" value="{{$brand->name}}" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Edit</button>
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