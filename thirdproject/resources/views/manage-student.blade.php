@extends('master')

@section('title')
    Manage Student Page
@endsection
@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white">
                        <div class="card-header text-center bg-dark">All Student</div>
                        <div class="card-body bg-secondary">
                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                           <table class="table table-bordered text-white table-hover bg-success">
                               <thead class="bg-dark">
                               <tr>
                                   <th>SL NO</th>
                                   <th>Student ID</th>
                                   <th>Student Name</th>
                                   <th>Student Email</th>
                                   <th>Student Mobile</th>
                                   <th>action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($students as $student)
                               <tr>
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$student->id}}</td>
                                   <td>{{$student->name}}</td>
                                   <td>{{$student->email}}</td>
                                   <td>{{$student->mobile}}</td>
                                   <td>
                                       <a href="{{route('edit-student',['id' => $student->id])}}" class="btn btn-success sm"><i class="fa fa-edit"></i></a>
                                       <a href="" class="btn btn-danger sm" onclick="deleteStudent({{$student->id}})">
                                           <i class="fa fa-trash"></i></a>
                                       <form action="{{route('delete-student',['id' => $student->id])}}" method="POST" id="deleteStudentForm{{$student->id}}">
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
        function deleteStudent(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this');
           if(check)
           {
               document.getElementById('deleteStudentForm'+ id).submit();
           }
        }
    </script>
@endsection
