<?php



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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;

use App\Http\Controllers\NameController;
use App\Http\Middleware\CheckName;
// Route::namespace('Backend')->group(function(){
//     Route::post('/create/store',[ProductController::class,'store'])->name('products.store');

// });


// Route::get('/store', [ProductController::class, 'store']);
Route::resource('products', ProductController::class);


// Route::get('/name', [NameController::class, 'index'])->middleware('CheckName');


Route::middleware([CheckName::class])->group(function () {
    Route::get('/name', function () {
        return view('welcome');
    });
});