<?php

use App\Http\Controllers\Api\AudioController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\TafsirController;
use App\Models\Segment;
use Illuminate\Support\Facades\Route;

use App\Services\SearchIntelligence;

Route::get('/', function () {
    return view('maintenace');
});

Route::get('/tafsir', [TafsirController::class, 'index']);
Route::get('/tafsir/{id}', [TafsirController::class, 'show'])->where('id', '[a-zA-Z0-9_\-]+');
Route::get('/search', [SearchController::class, 'search']);
Route::get('/audio/{id}', [AudioController::class, 'stream'])->where('id', '[a-zA-Z0-9_\-]+');