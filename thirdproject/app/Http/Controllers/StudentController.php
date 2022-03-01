<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    protected $student;
    protected $students;

    public function index()
    {
        return view('all-student');

    }
    public function create(Request $request)
    {

        $this->students = new Student();
        $this->students->name        = $request->name;
        $this->students->email       = $request->email;
        $this->students->mobile      = $request->mobile;
        $this->students->save();


        return redirect()->back()->with('message', 'Student information save successfully');
    }
    public function manage()
    {
        $this->students =student::orderBy('id', 'desc')->get();
        return view('manage-student',['students' => $this->students]);

//        return student::orderBy('id', 'desc')->get();
//        return view('manage-student');

    }
    public function edit($id)
    {
        $this->student = Student::find($id);
        return view('edit-student',['student' => $this->student]);
    }
    public function update(Request $request, $id)
    {
        $this->student = Student::find($id);
        $this->student->name        = $request->name;
        $this->student->email       = $request->email;
        $this->student->mobile      = $request->mobile;
        $this->student->save();
        return redirect('/manage-student')->with('message', 'Student information save successfully');
    }
    public function delete($id)
    {
        $this->student = Student::find($id);
        $this->student->delete();
        return redirect('manage-student')->with('message', 'Student information delete successfully');
    }

}
