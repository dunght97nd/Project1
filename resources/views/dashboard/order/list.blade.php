@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                {{-- <th>First Name</th> --}}
                                <th>Name</th>
                                {{-- <th>Company Name</th> --}}
                                <th>Address</th>
                                {{-- <th>Town City</th>
                                <th>Country</th> --}}
                                {{-- <th>Postcode ZIP</th> --}}
                                <th>Email</th>
                                <th>Phone</th>
                                {{-- <th>Coupon Code</th> --}}
                                <th>Total</th>
                                <th>Status</th>
                                {{-- <th>Add Order Details</th> --}}
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="odd gradeX" align="center">
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->id ?? " "}} {{$order->last_name}} {{$order->first_name}}</td>
                                {{-- <td>{{$order->last_name}}</td> --}}
                                {{-- <td>{{$order->company_name}}</td> --}}
                                <td>{{$order->street_address}}, {{$order->town_city}}, {{$order->country}}</td>
                                {{-- <td>{{$order->town_city}}</td>
                                <td>{{$order->country}}</td> --}}
                                {{-- <td>{{$order->postcode_zip}}</td> --}}
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                {{-- <td>{{$order->coupon_code}}</td> --}}
                                <td>{{number_format($order->total, 2)}}</td>
                                <td>
                                    @if($order->status==1)
                                        Not Delivered
                                    @elseif($order->status==2)
                                        Delivered
                                    @else 
                                        Cancel Order
                                    @endif
                                </td>
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/order/addOrderDetail/{{$order->id}}">Add Order Details</a></td> --}}
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/order/edit/{{$order->id}}">View</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/order/delete/{{$order->id}}"> Delete</a></td>
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