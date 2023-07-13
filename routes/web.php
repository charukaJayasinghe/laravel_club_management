<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\editController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\manageUsersController;
use App\Http\Controllers\signinController;
use App\Http\Controllers\signoutController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserPostController;
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

Route::get('/signup',[UserHomeController::class,'signup'])->name('signup');
Route::get('/login',[UserHomeController::class,'login'])->name('Userlogin');
Route::get('/admin',[signinController::class,'index'])->name('signin');
Route::post('/adminLogin',[signinController::class,'login']);
Route::post('/userLoginProcess',[UserHomeController::class,'loginprocess']);
Route::post('/userSignup',[UserHomeController::class,'signupProcess']);
Route::get('/',[guestController::class,'index'])->name('home');

Route::middleware('user')->group(function () {
    Route::get("/userDashboard",[UserDashboardController::class,'viewHome'])->name('viewHome');
    Route::get("/createPost",[UserPostController::class,'viewCreatePost'])->name('viewCreatePost');
    Route::post("/createPostProcess",[UserPostController::class,'makePost']);
    Route::post('/user/sigout',[signoutController::class,'signout']);
    Route::get('/viewMyPosts',[UserPostController::class,'viewMyPosts'])->name('viewMyPosts');
});
Route::middleware('admin')->group(function () {
    Route::post("/dashboard/approveUserProcess",[manageUsersController::class,'approveUserProcess']);
    Route::get("/dashboard/approveUser",[manageUsersController::class,'approveUser'])->name('approveUser');
    Route::post("/dashboard/searchUser",[manageUsersController::class,'searchUser']);
    Route::post("/dashboard/viewUser",[manageUsersController::class,'viewUser']);
    Route::post("/dashboard/blockUser",[manageUsersController::class,'statusChange']);
    Route::get("/manageUser",[manageUsersController::class,'index'])->name('manageUser');
    Route::get('/dashboard', [loginController::class,'login'])->name('login');
    Route::get('/dashboard/edit',[editController::class,'index'])->name("edit");
    Route::post('/dashboard/addClass',[editController::class,'saveClass']);
    Route::post('/dashboard/removeClass',[editController::class,'removeClass']);
    Route::post('/dashboard/viewClass',[editController::class,'viewClass']);
    Route::post('/dashboard/sigout',[signoutController::class,'signout']);
    Route::get('/dashboard/approvePosts',[AdminPostController::class,'approve'])->name('adminApprovePost');
    Route::post('/dashboard/viewPost',[AdminPostController::class,'viewPost']);
    Route::post('/dashboard/approvePostProcess',[AdminPostController::class,'approvePost']);
});


