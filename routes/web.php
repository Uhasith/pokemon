<?php

use App\Livewire\ShopPage;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

require __DIR__ . '/auth.php';

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', function () {
    return redirect()->route('set-index');
});

Volt::route('/sets', 'pages.sets-page')->name('set-index');
Volt::route('/sets/{slug}', 'pages.set-details-page')->name('set-details');
Volt::route('/sets/{setSlug}/{slug}', 'pages.card-details-page')->name('card-details');

Route::middleware([
    'auth',
    'admin',
])->prefix('admin')->group(function () {

    // Full Page Components Routes
    Volt::route('/set-page', 'pages.admin.set-page')->name('set-page');
    Volt::route('/card-page', 'pages.admin.card-page')->name('card-page');
    Volt::route('/price-page', 'pages.admin.price-page')->name('price-page');
    Volt::route('/card-set-page', 'pages.admin.card-set-page')->name('card-set-page');
    Volt::route('/card-tcg-pc-page', 'pages.admin.card-tcg-pc-page')->name('card-tcg-pc-page');
    Volt::route('/set-set-id-page', 'pages.admin.set-set-id-page')->name('set-set-id-page');
    Volt::route('/population-page', 'pages.admin.population-page')->name('population-page');
    Volt::route('/submitted-data-page', 'pages.admin.submitted-data-page')->name('submitted-data-page');
    Volt::route('/content-page', 'pages.admin.content-page')->name('content-page');
});

Route::get('/shop', ShopPage::class);
