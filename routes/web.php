<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Quotes;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/quotes', Quotes::class);
