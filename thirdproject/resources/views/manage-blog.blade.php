@extends('master')

@section('title')
    Manage Student Page
@endsection
@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">All Blog</div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Blog ID</th>
                                    <th>Blog Title</th>
                                    <th>Blog Author</th>
                                    <th>Blog Description</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->author}}</td>
                                        <td>{{$blog->description}}</td>
                                        <td>
                                            <a href="{{route('edit-blog',['id' => $blog->id])}}" class="btn btn-success sm"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger sm" onclick="deleteBlog({{$blog->id}})"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('delete-blog',['id' => $blog->id])}}" method="POST" id="deleteBlogForm{{$blog->id}}">
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
        function deleteBlog(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this');
            if(check)
            {
                document.getElementById('deleteBlogForm'+ id).submit();
            }
        }
    </script>
@endsection
