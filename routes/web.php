<?php

use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiswaController::class, 'siswa']);

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin ALL Route
Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/admin/profile/edit', 'editprofile')->name('admin.profile.edit');
        Route::post('/admin/profile/store', 'storeprofile')->name('admin.profile.store');
        Route::get('/admin/change/password', 'changepassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'updatepassword')->name('admin.update.password');
    });
    });

// Ekstrakulikuler
Route::middleware(['auth'])->group(function () {
    Route::controller(EkstrakulikulerController::class)->group(function(){
        Route::get('/admin/ekstrakulikuler', 'index')->name('admin.ekstrakulikuler');
        Route::get('/admin/ekstrakulikuler/create', 'create')->name('admin.ekstrakulikuler.create');
        Route::post('/admin/ekstrakulikuler/store', 'store')->name('admin.ekstrakulikuler.store');
        Route::get('/admin/ekstrakulikuler/edit/{id}', 'edit')->name('admin.ekstrakulikuler.edit');
        Route::post('/admin/ekstrakulikuler/update', 'update')->name('admin.ekstrakulikuler.update');
        Route::get('/admin/ekstrakulikuler/delete/{id}', 'delete')->name('admin.ekstrakulikuler.delete');
    });
    });

// Siswa
Route::middleware(['auth'])->group(function () {
    Route::controller(SiswaController::class)->group(function(){
        Route::get('/admin/siswa', 'index')->name('admin.siswa');
        Route::get('/admin/siswa/create', 'create')->name('admin.siswa.create');
        Route::post('/admin/siswa/store', 'store')->name('admin.siswa.store');
        Route::get('/admin/siswa/edit/{id}', 'edit')->name('admin.siswa.edit');
        Route::post('/admin/siswa/update', 'update')->name('admin.siswa.update');
        Route::get('/admin/siswa/delete/{id}', 'delete')->name('admin.siswa.delete');
    });
    });

    // Siswa Public
Route::controller(SiswaController::class)->group(function(){
    Route::get('/', 'siswa')->name('siswa');
});
require __DIR__.'/auth.php';
