<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app', [
        'modProfile' => \App\Models\Profile::first(),
        'modKegiatan' => \App\Models\Kegiatan::all(),
        'modRiset' => \App\Models\Riset::all(),
    ]);
});

Route::get('/filament/assets/{file}', function ($file) {
    return response()->file(public_path("filament/assets/{$file}"));
})->where('file', '.*')->middleware('web');
