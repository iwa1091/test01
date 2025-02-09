<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModalController;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ContactModal;

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
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::delete('/delete', [ModalController::class, 'delete'])->name('delete');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contact-modal', ContactModal::class);
