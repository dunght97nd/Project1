@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$user->id}}.{{$user->name}}
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
                        <form action="dashboard/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input required class="form-control" name="txtName" placeholder="Please Enter User Name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input required type="email" class="form-control" name="txtEmail" placeholder="Please Enter User Email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>User Password</label>
                                <input type="text" class="form-control" name="txtPassword" placeholder="Please Enter User Password"/>
                            </div>
                            <div class="form-group">
                                <label>Re-enter User Password </label>
                                <input type="password" class="form-control" name="txtPasswordRe" placeholder="Please Re-Enter User Password" />
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input 
                                    @if ($user->level == 1)
                                    {{"checked"}}
                                    @endif
                                    name="rdoLevel" value="1" checked="" type="radio">Normal
                                </label>
                                <label class="radio-inline">
                                    <input 
                                    @if ($user->level == 0)
                                    {{"checked"}}
                                    @endif
                                    name="rdoLevel" value="0" type="radio">Admin
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-default">User Edit</button>
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