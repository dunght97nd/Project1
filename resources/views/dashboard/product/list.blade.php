@extends('dashboard.layout.index')
@section('title','dashboard')
@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Brand</th>
                                <th>Product Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Weight</th>
                                <th>Sku</th>
                                <th>Feature</th>
                                <th>Tag</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="odd gradeX" align="center">
                                <td>{{$product->id}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->productCategory->name}}</td>
                                <td>
                                    {{$product->name}}
                                    <img style="width: 100px;
                                    "
                                    @if(count($product->productImages) > 0) 
                                    src="front/img/products/{{$product->productImages[0]->path}}"
                                    @endif alt="">
                                </td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->content}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    {{array_sum(array_column($product->productDetails->toArray(), 'qty'))}}
                                </td>
                                <td>{{$product->discount}}</td>
                                <td>{{$product->weight}}t</td>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->featured}}</td>
                                <td>{{$product->tag}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="dashboard/product/delete/{{$product->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dashboard/product/edit/{{$product->id}}">Edit</a></td>
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