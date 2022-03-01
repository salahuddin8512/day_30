@extends('master')
@section('title')
    Add product
@endsection
@section('body')
    <section class="py-5 bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white display-4">Add Product</div>
                        <div class="card-body">
                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                            <form action="{{route('new-product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <lable class="col-md-3">Product Name</lable>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3">Category Name</lable>
                                    <div class="col-md-9">
                                        <input type="text" name="category" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3">Brand Name</lable>
                                    <div class="col-md-9">
                                        <input type="text" name="brand" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3">Product price</lable>
                                    <div class="col-md-9">
                                        <input type="text" name="price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3">Product Description</lable>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3">Product Image</lable>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-md-3"></lable>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Create New Product"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
