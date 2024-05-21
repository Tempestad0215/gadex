<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessengerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::controller(ClientController::class)
    ->prefix('client')
    ->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/','store')->name('.store');
        Route::put('/update/{client}','update')->name('.update');
        Route::put('/destroy/{client}','destroy')->name('.destroy');
});

Route::controller(MessengerController::class)
    ->prefix('/messenger')
    ->group(function () {
        Route::get('/','index');
        Route::post('/','store');
        Route::put('/update/{messenger}','update');
        Route::put('/destroy/{messenger}','destroy');
    });

