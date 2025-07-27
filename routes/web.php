<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndustryController;
use App\Models\Industry;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('industries', IndustryController::class);


