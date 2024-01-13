<?php

use App\Http\Controllers\AdminBoardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\editController;
use App\Http\Controllers\FogotPasswordController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\manageUsersController;
use App\Http\Controllers\signinController;
use App\Http\Controllers\signoutController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserNewsController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserProfileController;
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
Route::post('/guestSubscribe',[guestController::class,'subscribe']);
Route::get('/testEmail',[TestController::class,'test']);
Route::post('/sendtestEmailProcess',[TestController::class,'sendEmail']);
Route::get('/fogotPassword',[FogotPasswordController::class,'index'])->name("fogotPassword");
Route::post('/sendEmailProcess',[FogotPasswordController::class,'sendEmail']);
Route::get('/enterVerifyCode',[FogotPasswordController::class,'verify']);
Route::get('/updatePassword',[FogotPasswordController::class,'viewUpdatePassword']);
Route::post('/verifyProcess',[FogotPasswordController::class,'verifyProcess']);
Route::post('/updatePasswordProcess',[FogotPasswordController::class,'updatePasswordProcess']);
Route::get('/guestViewNews',[guestController::class,'viewNews'])->name('guestViewNews');

Route::middleware('user')->group(function () {
    Route::get("/userDashboard",[UserDashboardController::class,'viewHome'])->name('viewHome');
    Route::get("/createPost",[UserPostController::class,'viewCreatePost'])->name('viewCreatePost');
    Route::post("/createPostProcess",[UserPostController::class,'makePost']);
    Route::post('/user/sigout',[signoutController::class,'signout']);
    Route::get('/viewMyPosts',[UserPostController::class,'viewMyPosts'])->name('viewMyPosts');
    Route::get('/postView',[UserPostController::class,'singlePostView'])->name('singlePostView');
    Route::get('/newsView',[UserNewsController::class,'singleNewsView'])->name('singleNewsView');
    Route::post('/user/postCommentProcess',[UserCommentController::class,'postComment']);
    Route::get('/userProfile',[UserProfileController::class,'view'])->name('userProfile');
    Route::post('/updateProfileProcess',[UserProfileController::class,'update']);
    Route::post('/user/postNewsCommentProcess',[UserNewsController::class,'postNewsComment']);
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
    Route::post('/dashboard/deletePostProcess',[AdminPostController::class,'deletePost']);
    Route::get('/admin/viewPostManage',[AdminPostController::class,'viewManagePost'])->name("adminManagePost");
    Route::get('/admin/viewCreateEvent',[AdminEventController::class,'index'])->name("adminViewCreateEvent");
    Route::post('/admin/createEventProcess',[AdminEventController::class,'create']);
    Route::get('/admin/adminViewManageEvent',[AdminEventController::class,'viewManage'])->name("adminViewManageEvent");
    Route::post('/admin/deleteEvent',[AdminEventController::class,'deleteEvent']);
    Route::get('/admin/viewCreateNews',[AdminNewsController::class,'index'])->name("viewCreateNews");
    Route::post('/admin/createNewsProcess',[AdminNewsController::class,'createNews']);
    Route::get('/admin/viewManageNews',[AdminNewsController::class,'manageNews'])->name('adminManageNews');
    Route::post('/dashboard/viewNews',[AdminNewsController::class,'viewNews']);
    Route::post('/dashboard/deleteNewsProcess',[AdminNewsController::class,'deleteNews']);
    Route::get('/dashboard/viewManageBoard',[AdminBoardController::class,'viewManageBoard'])->name('viewManageBoard');
    Route::get('/dashboard/viewManagePosition',[AdminBoardController::class,'viewManagePosition'])->name('viewManagePosition');
    Route::post('/dashBoard/addPosition',[AdminBoardController::class,'addPosition']);
    Route::post('/dashboard/removePosition',[AdminBoardController::class,'removePosition']);
    Route::get('/dashboard/viewAddBoardMember',[AdminBoardController::class,'viewAddBoardMember'])->name('viewAddMember');
    Route::post('/addBoardMemberProcess',[AdminBoardController::class,'addBoardMemberProcess']);
    Route::post('/dashboard/viewMemberDetails',[AdminBoardController::class,'getMemberDetails']);
    Route::post('/updateMemberDetails',[AdminBoardController::class,'updateMemberDetails']);
    Route::post('/deleteMember',[AdminBoardController::class,'deleteMember']);
    Route::post('/updatePosition',[AdminBoardController::class,'updatePosition']);
    Route::post('/updatePositionProcess',[AdminBoardController::class,'updatePositionProcess']);
});


