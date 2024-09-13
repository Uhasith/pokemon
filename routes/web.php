<?php

use App\Livewire\ShopPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

require __DIR__.'/auth.php';

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', function () {
    // if (Auth::check()) {
    //     return redirect()->route('dashboard');
    // }

    return redirect()->route('home');
});

Volt::route('/home', 'pages.home-page')->lazy()->name('home');

Route::middleware([
    'auth',
])->group(function () {

    // Full Page Components Routes
    Volt::route('/set-page', 'pages.admin.set-page')->lazy()->name('set-page');
    Volt::route('/card-page', 'pages.admin.card-page')->lazy()->name('card-page');
    Volt::route('/price-page', 'pages.admin.price-page')->lazy()->name('price-page');
    Volt::route('/population-page', 'pages.admin.population-page')->lazy()->name('population-page');
    Volt::route('/submitted-data-page', 'pages.admin.submitted-data-page')->lazy()->name('submitted-data-page');
    Volt::route('/content-page', 'pages.admin.content-page')->lazy()->name('content-page');

});

Route::get('/shop', ShopPage::class);
