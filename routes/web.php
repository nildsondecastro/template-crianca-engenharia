<?php

use App\Http\Controllers\Admin\HoldingController;
use App\Http\Controllers\Admin\ScriptController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\TemplateController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::resource('template.styles', StyleController::class);
    Route::resource('template.scripts', ScriptController::class);
    Route::resource('template.holdings', HoldingController::class);

    Route::resource('templates', TemplateController::class);
    Route::get('templates/{template}/file', [TemplateController::class, 'file'])->name('templates.file');

});
