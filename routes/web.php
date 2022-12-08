<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsersController;


// route for index page
Route::get('/',[IndexController::class,'index'])->name('home');
// detail post
Route::get('/singlepost/{id}',[IndexController::class,'singlepost'])->name('singlepost');

// route for custom auth
Route::get('/signin', [UsersController::class, 'index'])->name('login');
Route::post('/custom-login', [UsersController::class, 'customLogin'])->name('login.custom'); 
Route::get('/signup', [UsersController::class, 'signup'])->name('register-user');
Route::post('/custom-signup', [UsersController::class, 'customSignUp'])->name('register.custom'); 
Route::get('/signout', [UsersController::class, 'signOut'])->name('signout');
// Auth::routes();
Route::get('/book/{id}',[IndexController::class,'book'])->name('book');


// image deleting
Route::post('/delete-image',[IndexController::class,'delete'])->name('delete');
// routes for the agentform
Route::resource('agents', AgentController::class);

// routes for trip images
Route::resource('uploads',UploadController::class);

// route for comment [secction
Route::post('/comment',[CommentController::class,'storeComment'])->name('comment-store');
Route::delete('/delete/{comment}',[CommentController::class,'destroy'])->name('comment-delete');
Route::get('/comment',[CommentController::class,'show']);

// rout for storing bookings
Route::post('/store-bookings',[IndexController::class,'storebookings'])->name('store-bookings');


// rout for storing bookings
Route::get('/profile',[UsersController::class,'profile'])->name('profile');
// Route::get('/comment-profile',[CommentController::class,'comment']);


