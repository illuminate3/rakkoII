<?php

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
/*
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');
*/

// set pattern for overall
Route::pattern('id', '[0-9]+');
Route::pattern('lang', '[0-9a-z]+');


/*
|--------------------------------------------------------------------------
| Main
|--------------------------------------------------------------------------
*/

// Controllers

// Route::get('/welcome', function () {
//     return Theme::view('welcome');
// });

Route::get('/language/{lang}', 'LanguageController@language');

// Resources

// API DATA


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {

	Route::pattern('id', '[0-9]+');

// Resources
// Controllers
// API DATA

});
// --------------------------------------------------------------------------
