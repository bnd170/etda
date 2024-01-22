<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalLeagueController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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
    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('/el-proyecto', AboutUsController::class)->name('about-us.index');

    Route::prefix('/liga-nacional')->group(static function () {
        Route::get('', [NationalLeagueController::class, 'index'])->name('national-league.index');
        Route::get('/equipos', [NationalLeagueController::class, 'teams'])->name('national-league.teams');
        Route::get('/equipo/{team:sheet_name}', [NationalLeagueController::class, 'club'])->name('national-league.teams.club');
        Route::get('/partido/{game:slug}', [NationalLeagueController::class, 'game'])->name('national-league.game');
    });

    Route::prefix('/noticias')->group(static function () {
        Route::get('{news:slug}', [NewsController::class, 'post'])->name('news.post');
    });
});
