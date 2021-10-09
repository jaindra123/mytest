<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PatientController; 
use App\http\Controllers\DepartmentController; 
use App\http\Controllers\HospitalController; 
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


#--------------------------- Eloquent CRUD Operation With Image  -------------------#

Route::get('/add-patient',[PatientController::class,'addPatient']);
Route::post('/save-patient',[PatientController::class,'savePatient'])->name('patient.save');
Route::get('/patients',[PatientController::class,'getPatient']);
Route::get('/alldepartments',[PatientController::class,'getAllDepartment']);
Route::get('/add-patient',[PatientController::class,'getHospital']);
Route::get('/autocomplete',[PatientController::class,'AutoCompleteSearch'])->name('patient.search');


Route::get('/add-department',[DepartmentController::class,'addDepartment']);
Route::post('/save-department',[DepartmentController::class,'saveDepartment'])->name('department.save');
Route::get('/departments',[DepartmentController::class,'getDepartment']);

Route::get('/add-hospital',[HospitalController::class,'addHospital']);
Route::post('/save-hospital',[HospitalController::class,'saveHospital'])->name('hospital.save');
Route::get('/hospitals',[HospitalController::class,'getHospital']);
Route::get('/add-hospital',[HospitalController::class,'getAllDepartment']);