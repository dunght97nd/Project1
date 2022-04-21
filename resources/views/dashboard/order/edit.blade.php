@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Detail
                            <small>View</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="Order" style="margin-bottom: 40px;display: flex;justify-content: space-between">
                            <div class="infomation">
                                <div>
                                    <span style="font-weight: bolder;">Name:</span>
                                    {{$orderDetails->order->last_name}} {{$orderDetails->order->first_name}}
                                </div>
                                <div>
                                    <span style="font-weight: bolder;">Company Name:</span>
                                    {{$orderDetails->order->company_name}}
                                </div>
                                <div>
                                    <span style="font-weight: bolder;">Address:</span>
                                    {{$orderDetails->order->street_address}}, {{$orderDetails->order->country}}, {{$orderDetails->order->town_city}} 
                                </div>
                            {{-- <div>PostCode Zip:{{$orderDetails->order->postcode_zip}}</div> --}}
                                <div>
                                    <span style="font-weight: bolder;">Phone:</span>
                                    {{$orderDetails->order->phone}}
                                </div>
                                <div>
                                    <span style="font-weight: bolder;">Email:</span>
                                    {{$orderDetails->order->email}}
                                </div>
                            </div>

                            <div class="id">
                                <div>
                                    <span style="font-weight: bolder;">Order ID:</span>
                                    {{$orderDetails->order_id}}
                                </div>
                                @if($orderDetails->order->user)
                                <div>
                                    <span style="font-weight: bolder;">User ID:</span>
                                    {{$orderDetails->order->user->id ?? null}}
                                </div>
                                @endif

                                <div>
                                    <span style="font-weight: bolder;">Payment:</span>
                                    {{$orderDetails->order->payment_type ?? null}}
                                </div>

                                <div>
                                    <span style="font-weight: bolder;">Currency:</span>
                                    $
                                </div>
                            </div>
                            {{-- <div>Coupon Code:{{$orderDetails->order->coupon_code}}</div> --}}
                            {{-- <div>Total:{{$orderDetails->order->total}}</div> --}}
                            {{-- <div>Payment Type:{{$orderDetails->order->payment_type}}</div> --}}
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                    {{-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> --}}
                    <table class="table table-striped table-bordered table-hover">
                        <thead>                                   
                            <tr align="center">
                                <th>ID</th>
                            
                                <th>Product</th>
                                <th>Color</th>
                                <th>Size</th>
                                {{-- <th>Kho</th> --}}

                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                
                                {{-- <th>Delete</th> --}}
                                {{-- <th>Edit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            @foreach($order->orderDetails as $orderDetail)
                            <tr class="odd gradeX" align="center">
                                <td>{{$orderDetail->id}}</td>
                                <td>
                                    (ID:{{$orderDetail->productDetail->id}})
                                    {{$orderDetail->productDetail->product->name}}
                                <td>
                                    {{$orderDetail->color}}
                                </td>
                                <td>{{$orderDetail->size}}</td>
                               
                                {{-- <td>{{$orderDetail->productDetail->qty}}</td> --}}

                                <input type="hidden" name="product_sales_quantity" value="{{$orderDetail->qty}}">
                                <input type="hidden" name="order_productDetail_id" value="{{$orderDetail->productDetail_id}}">


                                <td>x{{$orderDetail->qty}}</td>
                                <td>

                                    {{-- @if($orderDetail->productDetail->product->discount != 0)
                                    <span style="text-decoration: line-through;">
                                        {{number_format($orderDetail->productDetail->product->price, 2)}}
                                    </span>
                                    @endif --}}
                                    {{number_format($orderDetail->amount, 2)}}
                                </td>
                                <td>{{number_format($orderDetail->amount * $orderDetail->qty, 2)}}</td>
                                {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/orderDetail/delete/{{$order->id}}/{{$orderDetail->id}}"> Delete</a></td> --}}
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/product/edit/{{$product->id}}">Edit</a></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="col-lg-12">
                        <div class="Order" style="margin-right: 30px;">
                            @if($coupon)
                            <div class="coupon" style="display: flex; justify-content: space-between;">
                                <div>
                                    <span style="font-weight: bolder;">Coupon:</span>
                                    {{$orderDetails->order->coupon_code}}
                                </div>
                                <div>
                                    @if($coupon->condition == 1)
                                        -{{$coupon->number}}%
                                    @else
                                        -{{number_format($coupon->number, 2)}}
                                    @endif    
                                </div>
                            </div>
                            @endif

                            <div class="total" style="display: flex; justify-content: space-between;margin-top: 20px;">
                                <div>
                                    <span style="font-weight: bolder;">Total payment:</span>
                                </div>
                                <div style="font-weight: bolder;">
                                    ${{number_format($orderDetails->order->total, 2)}}
                                </div>
                            </div>
                            {{-- <div>Coupon Code:{{$orderDetails->order->coupon_code}}</div> --}}
                            {{-- <div>Total:{{$orderDetails->order->total}}</div> --}}
                            {{-- <div>Payment Type:{{$orderDetails->order->payment_type}}</div> --}}
                        </div>
                    </div>

                    <div class="col-lg-12" style="justify-content: space-between;display: flex;margin: 30px 0;align-items: center;">
                        <div>
                            <span style="font-weight: bolder">Status:</span> 
                                @if($orderDetails->order->status==1)
                                    Not Delivered
                                @elseif($orderDetails->order->status==2)
                                    Delivered
                                @else 
                                    Cancel Order
                                @endif
                        </div>
                        @if($orderDetails->order->status == 1)
                            <form>
                            @csrf
                            <select id="{{$orderDetails->order->id}}"class="form-control order_details">
                                <option 
                                @if($orderDetails->order->status == 1)
                                {{"selected"}}
                                @endif
                                value="1">Not Delivered</option>
                                <option 
                                @if($orderDetails->order->status == 2)
                                {{"selected"}}
                                @endif
                                value="2">Delivered</option>
                            </select>
                            </form>
                        @elseif($orderDetails->order->status == 2)
                            <form>
                            @csrf
                            <select id="{{$orderDetails->order->id}}"class="form-control order_details">
                                <option 
                                @if($orderDetails->order->status == 2)
                                {{"selected"}}
                                @endif
                                value="2">Delivered</option>
                                <option 
                                @if($orderDetails->order->status == 3)
                                {{"selected"}}
                                @endif
                                value="3">Cancel Order</option>
                            </select>
                            </form>
                        @elseif($orderDetails->order->status == 3)
                            
                        @endif

                    </div>

                    <div class="col-lg-12">
                        <a href="dashboard/order/print/{{$order->id}}" target="_blank"  style="font-weight: bolder">Print DPF</a> 
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection


@section('script')
    <script type="text/javascript">
        $('.order_details').change(function(){
            // alert('Da change');
            var order_status = $(this).val();

            var order_id = $(this).attr('id');

            var _token = $('input[name = "_token"]').val();

            quantity = [];
            $("input[name='product_sales_quantity']").each(function(){
                 quantity.push($(this).val());
            });

            order_productDetail_id = [];
            $("input[name='order_productDetail_id']").each(function(){
                 order_productDetail_id.push($(this).val());
            });

            // alert(quantity);
            // alert(order_productDetail_id);
            $.ajax({
                url: 'dashboard/order/edit/{{$orderDetails->order->id}}',
                method: 'POST',
                data: {_token: _token, order_status:order_status,order_id:order_id,quantity:quantity,order_productDetail_id:order_productDetail_id},
                success: function(data){
                    // alert('OKEEEEEEEE');
                    location.reload();
                },
            });

            
        });

        
    </script>
@endsection