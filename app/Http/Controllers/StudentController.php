<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function allData() {
        $students = Student::orderBy('id', 'DESC')->get();
        return response()->json($students);
    }

    public function addStudent(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'department' => 'string|required'
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->department = $request->input('department');
        $student->save();
    }

    public function updateStudent(Request $request) {
        $student = Student::findOrFail($request->id);
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'department' => 'string|required'
        ]);
        
        $data = $request->all();
        $status = $student->fill($data)->save();

        if($status) {
            return response($status);
        } else {
            return response('something went wrong');
        }
    }

    public function deleteStudent(Request $request) {
        $student = Student::findOrFail($request->id);
        $status = $student->delete();

        if($status) {
            return response('Successfully deleted data.');
        } else {
            return response('Data not deleted.');
        }
    }
}
