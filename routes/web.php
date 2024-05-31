<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reportcontroller;
use App\Http\Controllers\technician\ProfileController as TechnicianProfileController;
use App\Http\Controllers\technician\ReportController as TechnicianReportController;
use App\Http\Controllers\technician\DashboardController as TechnicianDashboardController;
use App\Http\Controllers\technician\LoginController as TechnicianLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'account'],function(){

    //Guest middleware student/staff
    Route::group(['middleware'=>'guest'],function() {
        Route::get('login',[AuthController::class,'index'])->name('account.login');
        Route::get('register',[AuthController::class,'register'])->name('account.register');
        Route::post('process-register',[AuthController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[AuthController::class,'authenticate'])->name('account.authenticate');

    });

    //Aunthentication Middleware student/staff
    Route::group(['middleware'=>'auth'],function(){
        Route::post('logout',[AuthController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');

        Route::get('profile', [ProfileController::class, 'showProfile'])->name('account.profile');
        Route::get('changePassword', [ProfileController::class, 'editPassword'])->name('account.changePassword');
        Route::get('newReport', [ReportController::class, 'newReport'])->name('account.newReport');
        Route::post('newReport', [ReportController::class, 'submitReport'])->name('account.submitReport');

        Route::get('profile/edit', [ProfileController::class, 'editProfile'])->name('account.editProfile');
        Route::patch('profile/update', [ProfileController::class, 'updateProfile'])->name('account.updateProfile');

        Route::put('update-Password', [ProfileController::class, 'updatePassword'])->name('account.updatePassword');

        Route::get('report/history', [ReportController::class, 'history'])->name('account.reportHistory');
        Route::get('report/detail/{id}', [ReportController::class, 'detail'])->name('account.reportDetail');

        Route::middleware('auth')->get('report/history', [ReportController::class, 'history'])->name('account.reportHistory');




    });

});


Route::group(['prefix'=>'admin'],function(){

    //Guest middleware admin
    Route::group(['middleware'=>'admin.guest'],function() {
        Route::get('login',[LoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('admin.authenticate');


    });

    //Aunthentication Middleware admin
    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

    });

});

Route::group(['prefix'=>'technician'],function(){

    //Guest middleware technician
    Route::group(['middleware'=>'technician.guest'],function() {
        Route::get('login',[TechnicianLoginController::class,'index'])->name('technician.login');
        Route::post('authenticate',[TechnicianLoginController::class,'authenticate'])->name('technician.authenticate');

    });

    //Aunthentication Middleware technician
    Route::group(['middleware'=>'technician.auth'],function(){
        Route::get('dashboard',[TechnicianDashboardController::class,'index'])->name('technician.dashboard');
        Route::post('logout',[TechnicianLoginController::class,'logout'])->name('technician.logout');

        Route::get('profile', [TechnicianProfileController::class, 'showProfile'])->name('technician.profile');
        Route::get('profile/edit', [TechnicianProfileController::class, 'editProfile'])->name('technician.editProfile');
        Route::post('profile/update', [TechnicianProfileController::class, 'updateProfile'])->name('technician.updateProfile');

        Route::get('changePassword', [TechnicianProfileController::class, 'editPassword'])->name('technician.changePassword');
        Route::post('update-Password', [TechnicianProfileController::class, 'updatePassword'])->name('technician.updatePassword');

        Route::get('report/history', [TechnicianReportController::class, 'list'])->name('technician.manageReport');
        Route::get('report/detail/{id}', [TechnicianReportController::class, 'detail'])->name('technician.reportDetail');
        Route::get('report/status/{id}', [TechnicianReportController::class, 'showUpdateStatusForm'])->name('technician.showUpdateStatusForm');
        Route::post('report/status/{id}', [TechnicianReportController::class, 'updateStatus'])->name('technician.updateStatus');
        Route::post('report/submit', [TechnicianReportController::class, 'submitStatus'])->name('technician.submitStatus');

    });

});



