<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Kegiatan;
use App\Models\Riset;

$sharedData = [
    'modProfile' => Profile::first(),
    'modKegiatan' => Kegiatan::orderBy('created_at', 'desc')->get(),
    'modRiset' => Riset::orderBy('created_at', 'desc')->get(),
];

Route::view('/', 'app', $sharedData)->name('home');
Route::view('/about-us', 'about-us', $sharedData)->name('about.us');
Route::view('/our-services', 'our-services', $sharedData)->name('our.services');
Route::view('/contact-us', 'contact-us', $sharedData)->name('contact.us');
Route::resource('/kegiatans', \App\Http\Controllers\KegiatanController::class);
Route::resource('/risets', \App\Http\Controllers\RisetController::class);
