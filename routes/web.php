<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app', [
        'modProfile' => \App\Models\Profile::first(),
        'modKegiatan' => \App\Models\Kegiatan::all(),
        'modRiset' => \App\Models\Riset::all(),
    ]);
});
