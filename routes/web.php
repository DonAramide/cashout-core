<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;

Route::get('/', function () {
    // return view('welcome');
    return response()->json(
        [
            'status'  => 'success',
            'message' => 'You have reached the ' . config('app.env') . ' environment of '. config('app.name')
        ],
        200
    );
});

Route::get(
    'health',
    [HealthCheckController::class, 'health']
)->name('health');
