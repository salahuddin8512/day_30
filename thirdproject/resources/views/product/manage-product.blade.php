@extends('master')

@section('title')
    Manage product Page
@endsection
@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white">
                        <div class="card-header text-center bg-dark">All Product</div>
                        <div class="card-body bg-secondary">
                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                            <table class="table table-bordered text-white table-hover bg-success">
                                <thead class="bg-dark">
                                <tr>
                                    <th>SL NO</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Brand Name</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Image</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="{{asset($product->image)}}" alt="" height="100" width="120"/></td>
                                        <td>
                                            <a href="{{route('edit-product',['id' => $product->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteProduct({{$product->id}})">
                                                <i class="fa fa-trash"></i></a>
                                            <form action="{{route('delete-product',['id' => $product->id])}}" method="POST" id="deleteProductForm{{$product->id}}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteProduct(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this');
            if(check)
            {
                document.getElementById('deleteProductForm'+id).submit();
            }
        }
    </script>
@endsection
