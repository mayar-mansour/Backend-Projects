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


// Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    });
    // Route::get('/dashboard_count', [EmployeeController::class, 'dashboard'])->name('dashboard_count');
    Route::get('/admin.dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard_count');
    Route::get('/logout_admin', [AdminController::class, 'logoutAdmin'])->name('logout_admin');
    Route::get('/dashboard_profile', [AdminController::class, 'adminprofile'])->name('dashboard_profile');
    Route::get('/employee_search', [EmployeeController::class, 'employeeSearch'])->name('employee_search');
    //job
    Route::get('/job', [JobController::class, 'addNewPosition']);
    Route::post('/add-job', [JobController::class, 'AddJob'])->name('add-job');
    Route::get('/display-job', [JobController::class, 'fetchPositionData'])->name('display-job');
    Route::delete('/delete/{id}', [JobController::class, 'destroyPosition'])->name('destroy');
    Route::get('/edit_job/{id}', [JobController::class, 'editPosition'])->name('edit_job');
    Route::post('/updateJob', [JobController::class, 'updatePosition'])->name('updateJob');
    Route::get('/show_emp/{id}', [JobController::class, 'showJobsEmployee'])->name('show_emp');
    // Route::post('/updateJob', [JobController::class, 'updateJob'])->name('updateJob');
    Route::get('/job_search', [JobController::class, 'searchPositions'])->name('job_search');
    //employee
    Route::get('/registration', [EmployeeController::class, 'registartion']);
    Route::post('/registartion-user', [EmployeeController::class, 'registartionEmp'])->name('registartion-user');
    Route::get('/display_employee', [EmployeeController::class, 'fetchEmployeeData'])->name('display_employee');
    // Route::get('/employee_paging', [EmployeeController::class, 'pageIndex'])->name('employee_paging');
    Route::get('/show_employee/{id}', [EmployeeController::class, 'showEmployee'])->name('show_employee');
    Route::delete('/deleteEmployee/{id}', [EmployeeController::class, 'destroyEmployee'])->name('destroyEmployee');
    Route::get('/edit_employees/{id}', [EmployeeController::class, 'editEmployee'])->name('edit_employees');
    Route::post('/update_employees', [EmployeeController::class, 'updateEmployee'])->name('update_employees');
    //attendance

    Route::get('/attendance', [AttendanceController::class, 'listOfAttendances'])->name('attendance');
    Route::get('/search_employee_attend', [AttendanceController::class, 'searchEmployeeAttend'])->name('search_employee_attend');
    Route::get('/edit_employee_attendance/{id}', [AttendanceController::class, 'editEmployeeAttend'])->name('edit_employee_attendance');
    Route::post('/update_employee_attendance', [AttendanceController::class, 'updateEmployeeAttend'])->name('update_employee_attendance');
});


// Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin')->name('admin');

//admin
Route::get('/reg_admin', [AdminController::class, 'registrationPage']);
Route::post('/registartion_admin', [AdminController::class, 'adminRegistration'])->name('registartion_admin');
Route::get('/login_page', [AdminController::class, 'loginPage'])->name('login');
Route::post('/login_admin', [AdminController::class, 'loginAdmin'])->name('login_admin');

Route::group( ['middleware' => 'auth:employee'], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/show_user_details', [UserController::class, 'profileDetails'])->name('show_user_details');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    //attendance
    Route::post('/check_out', [AttendanceController::class, 'checkOut'])->name('check_out');
    Route::post('/check_in', [AttendanceController::class, 'checkIn'])->name('check_in');

});
//login
Route::get('/login', [UserController::class, 'login']);
Route::post('/login_user', [UserController::class, 'loginUser'])->name('login_user');
// Route::get('/profile', [UserController::class, 'profile'])->name('profile');


