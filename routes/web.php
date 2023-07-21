<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);
// laravel logo
Route::get('logo', [HomeController::class, 'logo'])->name('logo');
Route::post('logo', [HomeController::class, 'logo']);
// route for details page
Route::get('detail/{id}',[HomeController::class, 'detail']);
// cagtegory according to post
Route::get('category/{id}',[HomeController::class, 'category']);
// All  Category
Route::get('all-category', [HomeController::class, 'allCategory']);
// save post
Route::get('save_post', [HomeController::class, 'save_post_form'])->name('savepost');
Route::post('save_post', [HomeController::class, 'save_post_data']);
//manage post
Route::get('manage_post', [HomeController::class, 'manage_post']);
// add comment in post
Route::post('submit-comment/{id}',[HomeController::class, 'submit_comment']);
// admin show comment
Route::get('admin/comment', [HomeController::class, 'comment'])->name('comment');
// // admin show comment
Route::get('admin/comment/delete/{id}', [HomeController::class, 'delete_comment']);

Route::get('admin/login', [AdminController::class, 'login'])->name('adminlogin');
Route::post('admin/login', [AdminController::class, 'submit_login'])->name('submitLogin');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
// admin dashboard route
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//category resources route
Route::resource('admin/category', CategoryController::class);
// admin delete category route
Route::get('admin/category/{id}/delete', [CategoryController::class, 'destroy']);
//sidebar resources route
Route::resource('admin/sidebar', SidebarController::class);
// admin delete category route
Route::get('admin/sidebar/{id}/delete', [SidebarController::class, 'destroy']);
//Post resources route
Route::resource('admin/post', PostController::class);
// admin delete Post route
Route::get('admin/post/{id}/delete', [PostController::class, 'destroy']);
//route for setting
Route::get('admin/setting',[SettingController::class, 'index']);
Route::post('admin/setting',[SettingController::class, 'save_setting']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
