<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('tickets/{ticket_id}', 'TicketsController@show');
Route::get('my_tickets', 'TicketsController@userTickets');


Route::group(['prefix' => 'admin'], function() {
	Route::get('tickets', 'TicketsController@index');
	Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

// Route::resource('tickets', 'TicketsController', ['except' => ['show', 'destroy']]);

Route::post('comment', 'CommentsController@postComment');
