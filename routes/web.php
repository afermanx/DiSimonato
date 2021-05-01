<?php

use Illuminate\Support\Facades\Route;

/*
 * Rotas Site
 * */
Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController')->name('Site.home');
    Route::get('/sobre', 'SobreController')->name('Site.sobre');
});
