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
})->middleware('auth');

// Route::get('/', function () {
//     return view('applicants.home');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/employee', function () {
//     return view('employee.home');
// });

Route::get('/employee','EmployeeController@index')->middleware('auth');

Route::post('/employeeadd','EmployeeController@store');

Route::put('/employeeupdate/{id}', 'EmployeeController@update');

Route::delete('/employeedelete/{id}', 'EmployeeController@destroy');

Route::resource('/department','DepartmentController')->middleware('auth');


// Route::get('/employeesqr','EmployeeController@qrgenerator');
Route::get('/employeeqr/{id}', 'EmployeeController@qrgenerator');