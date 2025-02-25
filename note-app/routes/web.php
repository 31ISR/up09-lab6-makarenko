<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GoodbyeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/goodbye', [GoodbyeController::class, 'goodbye'])->name('goodbye');