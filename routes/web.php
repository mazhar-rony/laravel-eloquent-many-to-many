<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/create', 'AuthorsController@create');
Route::post('/authors/create', 'AuthorsController@store');
Route::get('/authors/{id}/edit', 'AuthorsController@edit');
Route::patch('/authors/{id}/edit', 'AuthorsController@update');
Route::delete('/authors/{id}/delete', 'AuthorsController@destroy');

Route::get('/books', 'BooksController@index');
Route::get('/books/create', 'BooksController@create');
Route::post('/books/create', 'BooksController@store');
Route::get('/books/{id}/edit', 'BooksController@edit');
Route::patch('/books/{id}/edit', 'BooksController@update');
Route::delete('/books/{id}/delete', 'BooksController@destroy');
