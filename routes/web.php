<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => Inertia::render('Auth/Login'))->name('login');
Route::get('/register', fn () => Inertia::render('Auth/Register'))->name('register');
Route::get('/counterparties', fn () => Inertia::render('Counterparties/List'));
Route::get('/counterparties/create', fn () => Inertia::render('Counterparties/Create'))->middleware('auth');
