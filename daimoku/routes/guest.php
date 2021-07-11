<?php

use App\Http\Controllers\Auth\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/convidado', [GuestController::class, 'create'])
                ->middleware('guest')
                ->name('convidado');

Route::post('/convidado', [GuestController::class, 'store'])
                ->middleware('guest');

Route::put('/convidado', [GuestController::class, 'login'])
                ->middleware('guest');
