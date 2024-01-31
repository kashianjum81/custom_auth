<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebSettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('get-users', [HomeController::class, 'getUser'])->name('get-users');


Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::get('sigma-templete', function () {
    return view('sigma');
});

Route::get('figma-templete', function () {
    return view('figma');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::get('modernizee-free', function () {
    return view('index');
});

Route::get('/welcome-dashboard', [HomeController::class,'admindashboard'])->name('welcome-dashboard');
Route::get('/admin-profile', [HomeController::class,'adminprofile'])->name('admin-profile');
Route::post('/admin-apdate', [HomeController::class,'adminupdate'])->name('profile-update');
Route::post('/password-apdate', [HomeController::class,'changePassword'])->name('password-update');


Route::get('/modernizee-free', [WebSettingsController::class,'index'])->name('modernizee-free');
Route::get('/web-settings', [WebSettingsController::class,'viewsettings'])->name('web-settings');
Route::post('/update-settings', [WebSettingsController::class,'websetting'])->name('update-settings');


