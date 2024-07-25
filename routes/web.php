<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


// homepage
Route::get('/', [ListingController::class, 'index']);


// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// store new Job listing
Route::post('/listings', [ListingController::class, 'store']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete']);


// show single listing (Keep at the bottom of this file)
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// ========================================= Users -----------------------------------------

// register user

Route::get('/register', [UserController::class, 'registerForm']);
