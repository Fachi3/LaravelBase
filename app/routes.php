<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Rutas de login
 */
Route::get  ('login',  'LoginController@getLogin'   );
Route::post ('login',  'LoginController@postLogin'   );
Route::any  ('logout', 'LoginController@anyLogout'   );

Route::get  ('password/remind', 'RemindersController@getRemind' );
Route::post ('password/remind', 'RemindersController@postRemind' );
Route::get  ('password/reset/{token}',  'RemindersController@getReset' );
Route::post ('password/reset',  'RemindersController@postReset' );


/**
 * Rutas de la app
 */
Route::any  ('/',  'HomeController@getIndex'   );

Route::controller('panel', 'PanelController');
