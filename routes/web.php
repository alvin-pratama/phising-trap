<?php

use App\Http\Controllers\PhisingTrapModeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shivella\Bitly\Facade\Bitly;

use App\Http\Controllers\ShortLinkMasterController;
use App\Http\Controllers\TrapingUrlController;


Route::get('/', function () {
    // return view('welcome');
    return view('login');
});

Route::get('/web-phising/update', function() {
    return view('trap.update');
});
Route::get('/web-phising/login', function() {
    return view('trap.login');
});
Route::get('/web-phising/video', function() {
    return view('trap.video');
});
Route::get('/web-phising/job', function() {
    return view('trap.job');
});
Route::get('/web-phising/application', function() {
    return view('trap.download');
});

Route::get('/education', function() {
    return view('education');
})->name('next.education');

Route::post('/strlnk', function (Request $request)
{
    $request->validate([
        'url' => 'required|url'
    ]);

    $shortLink = Bitly::shorten($request->url);

    return response()->json(['short_link' => $shortLink]);
});

Route::get('/strlnk', function ()
{
    $shortLink = Bitly::getUrl("https://www.google.com");

    return response()->json(['short_link' => $shortLink]);
});

// Rute dengan middleware auth
Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    
    Route::get('/settings', function () {
        return view('pages.settings');
    })->name('settings');
    
    // Route::get('/short-link-services', function () {
    //     return view('pages.short-link-services');
    // })->name('short-link-services');
    
    // Route::get('/traping-urls', function () {
    //     return view('traping-urls');
    // })->name('traping-urls');
    
    Route::prefix('short-link-services')->group(function () {
        Route::get('/', [ShortLinkMasterController::class, 'index'])->name('short-link-services');  // Pagination
        Route::get('/all', [ShortLinkMasterController::class, 'getAll']); // Semua data
        Route::post('/', [ShortLinkMasterController::class, 'store']); // Tambah data
        Route::delete('/{id}', [ShortLinkMasterController::class, 'destroy']); // Hapus data
    });

    Route::prefix('phising-trap-modes')->group(function () {
        Route::get('/', [PhisingTrapModeController::class, 'index'])->name('phising-trap-modes');  // Pagination
        Route::get('/all', [PhisingTrapModeController::class, 'getAll']); // Semua data
        Route::post('/', [PhisingTrapModeController::class, 'store']); // Tambah data
        Route::delete('/{id}', [PhisingTrapModeController::class, 'destroy']); // Hapus data
    });
    
    Route::prefix('traping-urls')->group(function () {
        Route::get('/', [TrapingUrlController::class, 'index'])->name('traping-urls');  // Pagination
        Route::get('/all', [TrapingUrlController::class, 'getAll']); // Semua data
        Route::post('/', [TrapingUrlController::class, 'store']); // Tambah data
        Route::delete('/{id}', [TrapingUrlController::class, 'destroy']); // Hapus data
    });
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');