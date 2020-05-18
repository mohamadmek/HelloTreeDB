<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('slides', 'SlideController@index');
Route::get('abouttexts', 'AbouttextController@index');
Route::get('brochures', 'BrochureController@index');
Route::get('testimonials', 'TestimonialController@index');
Route::group(['middleware' => ['jwt.verify']], function() {


Route::get('slides/{id}', 'SlideController@show');
Route::post('slides', 'SlideController@store');
Route::put('slides/{id}', 'SlideController@update');
Route::delete('slides/{id}', 'SlideController@destroy');


Route::get('abouttexts/{id}', 'AbouttextController@show');
Route::post('abouttexts', 'AbouttextController@store');
Route::put('abouttexts/{id}', 'AbouttextController@update');
Route::delete('abouttexts/{id}', 'AbouttextController@destroy');


Route::get('brochures/{id}', 'BrochureController@show');
Route::post('brochures', 'BrochureController@store');
Route::put('brochures/{id}', 'BrochureController@update');
Route::delete('brochures/{id}', 'BrochureController@destroy');


Route::get('testimonials/{id}', 'TestimonialController@show');
Route::post('testimonials', 'TestimonialController@store');
Route::put('testimonials/{id}', 'TestimonialController@update');
Route::delete('testimonials/{id}', 'TestimonialController@destroy');

});