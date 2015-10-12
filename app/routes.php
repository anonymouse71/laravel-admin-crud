<?php

Route::resource('user', 'UserController');
Route:: controller('/', 'HomeController');

Route::resource('books', 'BookController');



//Route::get('/create', array( 'uses' => 'UserController@create'));