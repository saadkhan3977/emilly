<?php
  

namespace Spatie\Permission\Middlewares;
// use Spatie\Permission\Middlewares\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AnnouncmentController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\BranchController;
  
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

// Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
  

Auth::routes();

// Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/member', [MemberController::class, 'index'])->name('member');
  
// Route::group(['middleware' => ['auth','verified']], function(){
// Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){

    Route::get('dashboard', [DashboardController::class,'index']);
    Route::get('logout', [DashboardController::class,'logout']);
    Route::resource('announcement', AnnouncmentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('members', MemberController::class);
    Route::resource('branches', BranchController::class);

});


// Route::group(['middleware' => ['role:admin']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
// });






