<?php

use App\Http\Controllers\CongeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PresenceController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'total')->name('welcome');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employe', 'index')->name('employe_index');
    Route::get('/employe/create', 'create')->name('employe_create');
    Route::post('/employe/store', 'store')->name('employe_store');
    Route::get('/employe/{id}', 'show')->name('employe_show');
    Route::get('/employe/edit/{id}', 'edit')->name('employe_edit');
    Route::post('/employe/update/{id}', 'update')->name('employe_update');
    Route::get('/employe/destroy/{id}', 'destroy')->name('employe_destroy');
    Route::get('/salaires', 'salaires')->name('employe_salaires');
});

Route::controller(CongeController::class)->group(function () {
    Route::get('/conge', 'index')->name('conge_index');
    Route::get('/conge/create', 'create')->name('conge_create');
    Route::post('/conge/store', 'store')->name('conge_store');
    Route::get('/conge/edit/{id}', 'edit')->name('conge_edit');
    Route::post('/conge/update/{id}', 'update')->name('conge_update');
});

Route::controller(PresenceController::class)->group(function () {
    Route::get('/presence', 'index')->name('presence_index');
    Route::get('/presence/create', 'create')->name('presence_create');
    Route::post('/presence/store', 'store')->name('presence_store');
    Route::get('/presence/edit/{id}', 'edit')->name('presence_edit');
    Route::post('/presence/update/{id}', 'update')->name('presence_update');
});