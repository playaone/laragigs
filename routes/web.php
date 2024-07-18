<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// homepage
Route::get('/', [ListingController::class, 'index']);


// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// store new Job listing
Route::post('/listings', [ListingController::class, 'store']);





// show single listing (Keep at the bottom of this file)
Route::get('/listings/{listing}', [ListingController::class, 'show']);
