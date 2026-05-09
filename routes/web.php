<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');

Route::livewire('/gallery', 'pages::gallery.index')->name('gallery');

require __DIR__ . '/settings.php';
