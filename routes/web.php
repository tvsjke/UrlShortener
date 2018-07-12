<?php

Route::get('/', 'HomeController@index')->name('home');

Route::post('/store', 'UrlController@store')->name('store');

Route::get('/{hash}', 'UrlController@get')->name('get');
