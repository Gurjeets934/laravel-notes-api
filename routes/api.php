<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


Route::get('/notes/search', [NoteController::class, 'search']);
Route::apiResource('notes', NoteController::class);

