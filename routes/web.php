<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
Route::resource('pendaftaran', Controller::class);
Route::get('/pendaftaran/{pendaftaran}/download', [Controller::class, 'downloadPdf'])->name('pendaftaran.download');
#Route::get('/', function () {
#    return view('welcome');
#});



