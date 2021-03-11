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

    }

    public function updateStudent(Request $request) {

    }

    public function deleteStudent(Request $request) {

    }
}
