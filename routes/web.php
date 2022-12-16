<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;

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
// Route::get('/', [welcomeController::class, 'index'])->name('blog.show');


Route::get('/',[WelcomeController::class, 'index'])->name('welcome.index');


Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');


// To create blog post
Route::get('/blog/create',[BlogController::class, 'create'])->name('blog.create');


// to  single blog post
Route::get('/blog/{post:slug}',[BlogController::class, 'show'])->name('blog.show');

// to edit blog post
Route::get('/blog/{post}/edit',[BlogController::class, 'edit'])->name('blog.edit');

// to update blog post
Route::put('/blog/{post}',[BlogController::class, 'update'])->name('blog.update');


// to update blog post
Route::delete('/blog/{post}',[BlogController::class, 'destroy'])->name('blog.destroy');


// To store blog post to the DB
Route::post('/blog',[BlogController::class, 'store'])->name('blog.store');


// to about page
Route::get('/about', function(){
    return view('about');
})->name('about');

// to contact page
Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');

// category resource controller
Route::resource('/categories', CategoryController::class,);

Route::get('/dashboard',function(){
    return view ('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';