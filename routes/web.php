<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

require __DIR__ . '/settings.php';
