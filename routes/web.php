<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Misadjalovic\Coder\Coder;

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

Route::get('/generate/{strenght}/{lenght}', function (Request $request) {

    $coder = new Coder();

    return $coder->generate($request->strenght, $request->lenght);
});


Route::get('/', function () {
    return view('welcome');
});
