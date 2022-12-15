<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExspenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ReportController;


Route::group(['middleware' => 'prevent-back-history'], function(){



// Dashboard
Route::get('dashboard/',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');
// income
Route::get('income/manage/', [IncomeController::class,'manage'])->name('manage_income')->middleware('auth');
Route::get('income/create/', [IncomeController::class, 'index'])->name('create_income')->middleware('auth');
Route::post('income/store/', [IncomeController::class,'store'])->name('store_income')->middleware('auth');
Route::get('income/edit/{id}/', [IncomeController::class,'edit'])->name('edit_income')->middleware('auth');
Route::post('income/update/{id}/', [IncomeController::class,'update'])->name('update_income')->middleware('auth');
Route::get('income/delete/{id}/', [IncomeController::class, 'delete'])->name('delete_income')->middleware('auth');

// Exspense
Route::get('exspense/manage/', [ExspenseController::class,'manage'])->name('manage_exspense')->middleware('auth');
Route::get('exspense/create/', [ExspenseController::class,'index'])->name('create_exspense')->middleware('auth');
Route::post('exspense/store/', [ExspenseController::class,'store'])->name('store_exspense')->middleware('auth');
Route::get('exspense/edit/{id}/', [ExspenseController::class,'edit'])->name('edit_exspense')->middleware('auth');
Route::post('exspense/update/{id}/', [ExspenseController::class,'update'])->name('update_exspense')->middleware('auth');
Route::get('exspense/delete/{id}/', [ExspenseController::class,'delete'])->name('delete_exspense')->middleware('auth');

// Authentication
Route::get('/', [HomeController::class,'login'])->name('login');
Route::get('register/', [HomeController::class,'register'])->name('register');
Route::post('register/submit/', [HomeController::class,'submit_register'])->name('submit_register');
Route::get('registration/verify/{token}/{email}',[HomeController::class,'registration_verify']);
Route::post('login/submit/', [HomeController::class,'login_submit'])->name('login_submit');
Route::get('logout/', [HomeController::class,'logout'])->name('logout');

// Category
Route::get('category/manage/', [CategoryController::class,'manage'])->name('manage_category')->middleware('auth');
Route::get('category/create/', [CategoryController::class,'index'])->name('create_category')->middleware('auth');
Route::post('category/store/', [CategoryController::class,'store'])->name('store_category')->middleware('auth');
Route::get('category/edit/{id}/', [CategoryController::class,'edit'])->name('edit_category')->middleware('auth');
Route::post('category/update/{id}/', [CategoryController::class,'update'])->name('update_category')->middleware('auth');
Route::get('category/delete/{id}/', [CategoryController::class,'delete'])->name('delete_category')->middleware('auth');

// Profile
Route::get('profile/manange/', [WebsiteController::class,'view_profile'])->name('view_profile')->middleware('auth');
Route::get('profile/edit/{id}/', [WebsiteController::class,'edit_profile'])->name('edit_profile')->middleware('auth');
Route::post('profile/update/{id}/', [WebsiteController::class,'update_profile'])->name('update_profile')->middleware('auth');

// Reprot
Route::get('report/manage/', [WebsiteController::class,'manage_report'])->name('manage_report')->middleware('auth');
Route::post('report/filter/', [WebsiteController::class,'filter_report'])->name('filter_report')->middleware('auth');
Route::get('main-report/manage/', [ReportController::class,'manage_report'])->name('manage_report')->middleware('auth');

});