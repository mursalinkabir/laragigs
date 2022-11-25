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

// Route::get('/hello',function(){
//     return response('<h1>Hello World</h1>')
//     ->header('Content-type','text/plain');
// });

// Route::get('/posts/{id}',function($id){
//     //die and dump
//     //dd($id);
//     // die , dumb and debug
//     ddd($id);
//     return response('Post '. $id);
// })->where('id','[0-9]+');
// // catching the request parameters
// Route::get('/search', function(Request $request){

//     //dd($request->name.' '.$request->city);
//     return $request->name.' '.$request->city;
// });