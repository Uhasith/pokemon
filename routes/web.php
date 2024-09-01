<?php

use Livewire\Volt\Volt;
use App\Livewire\ShopPage;
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
    Volt::route('/card-page', 'pages.admin.card-page')->lazy()->name('card-page');
    Volt::route('/price-page', 'pages.admin.price-page')->lazy()->name('price-page');

});


Route::get('/shop', ShopPage::class);

