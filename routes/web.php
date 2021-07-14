<?php

use Illuminate\Support\Facades\Route;

/*
 * Rotas Admin
 * */
Route::namespace('Admin')->group(function () {
    Route::get('/login', 'UsuariosControlador@logar')->name('Admin.login');
    Route::post('/login', 'UsuariosControlador@login')->name('Admin.login.do');
    Route::get('/logout', 'LoginController@logout')->name('Auth.logout');
    Route::get('/painel', 'PainelController@painel')->name('Admin.dash');



});


/*
 * Rotas Site
 * */
Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController')->name('Site.home');
    Route::get('/sobre', 'SobreController')->name('Site.sobre');
    Route::get('/shop', 'ShopController@index')->name('Site.shop');
});
