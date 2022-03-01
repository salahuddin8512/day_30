@extends('master')

@section('title')
    Add Blog page
@endsection
@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">Add Blog</div>
                        <div class="card-body">
                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                            <form action="{{route('add-blog')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Blog Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Author Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="author"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Blog Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Create New Blog"/>
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
