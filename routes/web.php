<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('index');
});

Route::get('/signup', function () {
    return view('index');
});

Route::get('/users', function () {
    return view('index');
});

Route::get('/events', function () {
    return view('index');
});

Route::get('/events/{id}/attendance', function () {
    return view('index');
});

Route::get('/attendee-events', function () {
    return view('index');
});