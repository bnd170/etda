<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalLeagueController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PredictorController;
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
    Route::get('acceso', [LoginController::class, 'showLoginForm'])->name('login');

    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('/el-proyecto', AboutUsController::class)->name('about-us.index');

    Route::prefix('/liga-nacional')->group(static function () {
        Route::get('/clasificacion', [NationalLeagueController::class, 'classification'])->name('national-league.classification');
        Route::get('/estadisticas', [NationalLeagueController::class, 'stats'])->name('national-league.stats');
        Route::get('/actualidad', [NationalLeagueController::class, 'news'])->name('national-league.news');
        Route::get('/equipos', [NationalLeagueController::class, 'teams'])->name('national-league.teams');
        Route::get('/calendario', [NationalLeagueController::class, 'calendar'])->name('national-league.calendar');
        Route::get('/equipo/{team:sheet_name}', [NationalLeagueController::class, 'club'])->name('national-league.teams.club');
        Route::get('/partido/{game:slug}', [NationalLeagueController::class, 'game'])->name('national-league.game');
    });

    Route::prefix('/noticias')->group(static function () {
        Route::get('{news:slug}', [NewsController::class, 'post'])->name('news.post');
    });

    Route::prefix('/podcast')->group(static function () {
        Route::get('episodios', [PodcastController::class, 'index'])->name('podcast.episodes');
    });

    Route::prefix('/porra/{tournament:slug}')->group(static function () {
        Route::get('', [PredictorController::class, 'tournamentGames'])->name('predictions.index');
    });
});
