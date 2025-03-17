<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PendaftaranApiController;

Route::prefix('pendaftaran')->group(function () {
    Route::get('/', [PendaftaranApiController::class, 'index']);
    Route::post('/', [PendaftaranApiController::class, 'store']);
    Route::get('/{pendaftaran}', [PendaftaranApiController::class, 'show']);
    Route::put('/{pendaftaran}', [PendaftaranApiController::class, 'update']);
    Route::delete('/{pendaftaran}', [PendaftaranApiController::class, 'destroy']);
});