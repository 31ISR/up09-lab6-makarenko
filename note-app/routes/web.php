<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GoodbyeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/goodbye', [GoodbyeController::class, 'goodbye'])->name('goodbye');

Route::resource('note', NoteController::class);