<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware([
    'auth',
])->group(function () {

    // Full Page Components Routes
    Volt::route('/set-page', 'pages.admin.set-page')->lazy()->name('set-page');

});


