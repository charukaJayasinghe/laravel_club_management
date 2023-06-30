<?php

use App\Http\Controllers\editController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\manageUsersController;
use App\Http\Controllers\signinController;
use App\Http\Controllers\signoutController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[signinController::class,'index'])->name('signin');
Route::post('/login',[signinController::class,'login']);

Route::middleware('admin')->group(function () {
    Route::get("/manageUser",[manageUsersController::class,'index'])->name('manageUser');
    Route::get('/dashboard', [loginController::class,'login'])->name('login');
    Route::get('/dashboard/edit',[editController::class,'index'])->name("edit");
    Route::post('/dashboard/addClass',[editController::class,'saveClass']);
    Route::post('/dashboard/removeClass',[editController::class,'removeClass']);
    Route::post('/dashboard/viewClass',[editController::class,'viewClass']);
   Route::post('/dashboard/sigout',[signoutController::class,'signout']);
});


