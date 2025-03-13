<?php

use App\Http\Controllers\StaticContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalLeagueController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PredictorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::prefix('/')->group(static function () {
    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('/el-proyecto', [StaticContentController::class, 'aboutUs'])->name('static.about-us.index');
    Route::get('/privacidad', [StaticContentController::class, 'privacy'])->name('static.privacy.index');



    Route::prefix('/liga-nacional')->group(static function () {
        Route::get('/clasificacion', [NationalLeagueController::class, 'classification'])->name('national-league.classification');
        Route::get('/estadisticas', [NationalLeagueController::class, 'stats'])->name('national-league.stats');
        Route::get('/actualidad', [NationalLeagueController::class, 'news'])->name('national-league.news');
        Route::get('/equipos', [NationalLeagueController::class, 'teams'])->name('national-league.teams');
        Route::get('/calendario', [NationalLeagueController::class, 'calendar'])->name('national-league.calendar');
        Route::get('/equipo/{sheet_name}', [NationalLeagueController::class, 'club'])->name('national-league.teams.club');
        Route::get('/partido/{game:slug}', [NationalLeagueController::class, 'game'])->name('national-league.game');
    });

    Route::prefix('/noticias')->group(static function () {
        Route::get('{news:slug}', [NewsController::class, 'post'])->name('news.post');
    });

    Route::prefix('/podcast')->group(static function () {
        Route::get('episodios', [PodcastController::class, 'index'])->name('podcast.episodes');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('/la-quini')->group(static function () {
            Route::get('/reglas', [StaticContentController::class, 'laQuiniGameRules'])->name('predictor.rules');
            Route::prefix('/{tournament:slug}')->group(static function () {
                Route::get('', [PredictorController::class, 'tournamentGames'])->name('predictor.index');
                Route::post('/guardar', [PredictorController::class, 'savePrediction'])->name('predictor.prediction.save');
                Route::get('/clasificacion', [PredictorController::class, 'tournamentRanking'])->name('predictor.ranking');
                Route::get('/mis-predicciones', [PredictorController::class, 'tournamentMyPredictions'])->name('predictor.my-predictions');
            });

        });
    });
});

require __DIR__.'/auth.php';
