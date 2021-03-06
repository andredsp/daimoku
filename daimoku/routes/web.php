<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Models\Room;

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

Route::get('/artisan/{param}', function ($param) {

    print "<br/> <strong>Comando:</strong> <samp>artisan $param </samp>";
    print '<br/> <strong>Retorno:</strong> <samp>' . Artisan::call($param) . '</samp>';
    print '<br/> <strong>Console:</strong> <br/>';
    print '<pre style="color: white;background: black;padding: 5px;">' . Artisan::output() . '</pre>';


    return '<br>';
});

Route::redirect('/', 'entrada');
Route::get('/entrada', [RoomController::class, 'index'])
// ->middleware(['guest'])
    ->name('entrada');

Route::get('/sala/{room:slug}', [RoomController::class, 'show'])
->middleware(['auth']);

require __DIR__.'/auth.php';

require __DIR__.'/guest.php';
