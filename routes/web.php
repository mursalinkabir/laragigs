<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing
Route::get('/', [ListingController::class,'index']);




// show create form
Route::get('/listings/create', [ListingController::class,'create']);

//single listing
//using wildcard to use id as a string param
Route::get('/listings/{listing}', [ListingController::class,'show']);


//Store listing data
Route::post('/listings', [ListingController::class,'store']);

// Show Edit form

Route::get('/listings/{listing}/edit', [ListingController::class,'edit']);
//update listing

Route::put('/listings/{listing}',[ListingController::class,'update']);