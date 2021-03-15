<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student', function () {
    return view('student.index');
});

Route::get('/allstudents', [\App\Http\Controllers\StudentController::class, 'allData'])->name('student.allData');
Route::put('/updatestudent', [\App\Http\Controllers\StudentController::class, 'updateStudent'])->name('student.update');
