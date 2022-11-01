<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;

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


Route::get('/dashboard', [EmployeeController::class, 'dashboard']);
// Route::get('/regs', [AdminController::class, 'admin_registration_page']);
//admin
Route::get('/reg_admin', [AdminController::class, 'registrationPage']);
Route::post('/registartion_admin', [AdminController::class, 'adminRegistration'])->name('registartion_admin');
Route::get('/login_page', [AdminController::class, 'loginPage']);
Route::post('/login_admin', [AdminController::class, 'loginAdmin'])->name('login_admin');

//job
Route::get('/job', [JobController::class, 'addNewPosition']);
Route::post('/add-job', [JobController::class, 'AddJob'])->name('add-job');
Route::get('/display-job', [JobController::class, 'fetchPositionData'])->name('display-job');
Route::delete('/delete/{id}', [JobController::class, 'destroyPosition'])->name('destroy');
Route::get('/edit_job/{id}', [JobController::class, 'editPosition'])->name('edit_job');
Route::get('/update/{id}', [JobController::class, 'updatePosition'])->name('update');
Route::get('/show_emp/{id}', [JobController::class, 'showJobsEmployee'])->name('show_emp');
Route::post('/updateJob', [EmployeeController::class, 'updateJob'])->name('updateJob');
//employee
Route::get('/registration', [EmployeeController::class, 'registartion']);
Route::post('/registartion-user', [EmployeeController::class, 'registartionEmp'])->name('registartion-user');
Route::get('/display_employee', [EmployeeController::class, 'fetchEmployeeData'])->name('display_employee');
Route::delete('/deleteEmployee/{id}', [EmployeeController::class, 'destroyEmployee'])->name('destroyEmployee');
Route::get('/edit_employees/{id}', [EmployeeController::class, 'editEmployee'])->name('edit_employees');
Route::post('/update_employees', [EmployeeController::class, 'updateEmployee'])->name('update_employees');
//login
Route::get('/login', [UserController::class, 'login']);
Route::post('/login_user', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//attendance
Route::post('/check_out', [AttendanceController::class, 'checkOut'])->name('check_out');
Route::post('/check_in', [AttendanceController::class, 'checkIn'])->name('check_in');
Route::get('/attendance', [AttendanceController::class, 'listOfAttendances'])->name('attendance');;
