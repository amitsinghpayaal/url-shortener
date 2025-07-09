<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Invitation routes
    Route::get('/invite', [\App\Http\Controllers\InvitationController::class, 'showForm'])
        ->middleware('role:SuperAdmin,Admin');
    Route::post('/invite', [\App\Http\Controllers\InvitationController::class, 'invite'])
        ->middleware('role:SuperAdmin,Admin');

    // Short URL routes
    Route::get('/short-urls', [\App\Http\Controllers\ShortUrlController::class, 'show'])
        ->middleware('role:SuperAdmin,Admin,Member');
    Route::post('/short-urls', [\App\Http\Controllers\ShortUrlController::class, 'create'])
        ->middleware('role:Admin,Member');

});

// Short URL public redirect route (must be last to avoid conflicts)
Route::get('/{short_code}', [\App\Http\Controllers\ShortUrlController::class, 'redirect']);
