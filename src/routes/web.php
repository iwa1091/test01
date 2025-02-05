<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [ContactController::class, 'create'])->name('contacts.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/search', [AdminController::class, 'search'])->name('search');
Route::get('/contacts/{id}', [AdminController::class, 'show']);
Route::delete('/contacts/delete', [AdminController::class, 'destroy']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::delete('/delete', [ModalController::class, 'delete'])->name('delete');
