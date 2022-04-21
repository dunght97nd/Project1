@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard
                            <small>Home</small>

                        </h1>
                        {{$date}}
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Auth::check())
                    <div class="col-lg-12">
                        <div class="page-header">
                            Hello 
                            <span style="font-weight: bolder;">
                                {{Auth::user()->name}}
                            </span> !
                             Welcome to dashboard ! Your level is 
                             <span style="font-weight: bolder;">
                                 @if(Auth::user()->level == 0)
                                 Admin
                                 @else
                                 Staff
                                 @endif
                             </span>
                        </div>
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2" align="center" style="font-weight: bolder;">Orders</th>
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Not Delivered</td>
                                <td>{{count($order1)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Delivered</td>
                                <td>{{count($order2)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Cancel Order</td>
                                <td>{{count($order3)}}</td>
                            </tr>
                            <tr class="odd gradeX" align="center" style="font-weight: bolder;">
                                <td>Total: </td>
                                <td>{{count($orders)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2" align="center" style="font-weight: bolder;">Users</th>
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Admin</td>
                                <td>{{count($userAdmin)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Staff</td>
                                <td>{{count($userStaff)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Normal</td>
                                <td>{{count($userNormal)}}</td>
                            </tr>
                            <tr class="odd gradeX" align="center" style="font-weight: bolder;">
                                <td>Total: </td>
                                <td>{{count($users)}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2" align="center" style="font-weight: bolder;">Products</th>
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Shirst</td>
                                <td>{{count($product1)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Pants</td>
                                <td>{{count($product2)}}</td>
                                
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>Accessory</td>
                                <td>{{count($product3)}}</td>
                            </tr>
                            <tr class="odd gradeX" align="center" style="font-weight: bolder;">
                                <td>Total: </td>
                                <td>{{count($products)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->
@endsection