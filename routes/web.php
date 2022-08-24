<?php

use App\Http\Controllers\Admin\HoldingController;
use App\Http\Controllers\Admin\HoldingItemController;
use App\Http\Controllers\Admin\ScriptController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Domain\PublicController;
use Illuminate\Support\Facades\Route;

//subdomínios
//Route::group(['domain' => '{username}.' . env('APP_URL')], function () {
//    Route::get('/', [PublicController::class, 'index'])->name('public.index');
//});

//demais rotas
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rotas relacionadas com um evento específico
Route::group(['prefix' => '{id}'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'publications'])->name('publications');

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/volunteer', [App\Http\Controllers\VolunteerController::class, 'registerVolunteer'])->name('volunteer.register');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    //Route::resource('holding.holdings_items', HoldingItemController::class);
//
    //Route::resource('template.styles', StyleController::class);
    //Route::resource('template.scripts', ScriptController::class);
    //Route::resource('template.holdings', HoldingController::class);
//
    //Route::resource('templates', TemplateController::class);
    //Route::get('templates/{template}/file', [TemplateController::class, 'file'])->name('templates.file');

});
