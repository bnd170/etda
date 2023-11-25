<?php

use App\Http\Controllers\NationalLeagueController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('/')->group(static function () {
    Route::get('', static function () {
        return Inertia::render('Home/Index');
    });

    Route::prefix('/liga-nacional')->group(static function () {
        Route::get('', [NationalLeagueController::class, 'index'])->name('national-league.index');
        Route::get('/equipos', [NationalLeagueController::class, 'teams'])->name('national-league.teams');
        Route::get('/equipo/sd-eibar', [NationalLeagueController::class, 'club'])->name('national-league.teams.club');
    });

    Route::prefix('/noticias')->group(static function () {
        Route::get('', [NewsController::class, 'post'])->name('news.post');
    });
});
