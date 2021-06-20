<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artisan/{param}', function ($param) {

    print "<br> Comando: <samp>artisan $param </samp>";
    print '<br> Retorno: <samp>' . Artisan::call($param) . '</samp>';
    print '<br> Console: <br>';
    print '<pre>' . Artisan::output() . '</pre>';


    return '<br>';
});
