<?php

use App\Http\Controllers\PhisingTrapModeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shivella\Bitly\Facade\Bitly;

use App\Http\Controllers\ShortLinkMasterController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TrapingUrlController;
use App\Http\Controllers\TrapingUrlMonitoringController;
use App\Models\TrapingUrlMonitoring;

Route::get('/', function () {
    return view('welcome');
    // return view('login');
});

Route::get('/web-phising/update', function () {
    return view('trap.update');
});
Route::get('/web-phising/login/{random}', function ($random) {
    return view('trap.login', compact('random'));
});
Route::get('/web-phising/video/{random}', function ($random) {
    return view('trap.video', compact('random'));
});
Route::get('/web-phising/job/{random}', function ($random) {
    return view('trap.job', compact('random'));
});
Route::get('/web-phising/application', function () {
    return view('trap.download');
});

Route::get('/education', function () {
    return view('education');
})->name('next.education');

Route::post('/strlnk', function (Request $request) {
    $request->validate([
        'url' => 'required|url'
    ]);

    $shortLink = Bitly::shorten($request->url);

    return response()->json(['short_link' => $shortLink]);
});

Route::get('/strlnk', function () {
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

    Route::prefix('targets')->group(function () {
        Route::get('/', [TargetController::class, 'index'])->name('targets');  // Pagination
        Route::get('/{id}', [TargetController::class, 'show']); // Semua data
        Route::get('/by/all', [TargetController::class, 'getAll']); // Semua data
        Route::post('/', [TargetController::class, 'store']); // Tambah data
        Route::put('/{id}', [TargetController::class, 'put']); // Tambah data
        Route::delete('/{id}', [TargetController::class, 'destroy']); // Hapus data
    });

    Route::prefix('traping-urls-monitoring')->group(function () {
        Route::get('/target/{target_id}', [TrapingUrlMonitoringController::class, 'index'])->name('traping-urls-monitoring');  // Pagination
        Route::get('/all/{target_id}', [TrapingUrlMonitoringController::class, 'getAll']); // Semua data
        Route::post('/', [TrapingUrlMonitoringController::class, 'store']); // Tambah data
        Route::delete('/{id}', [TrapingUrlMonitoringController::class, 'destroy']); // Hapus data
    });

});

Route::get('/trap/{random}', function ($random) {
    $trap = TrapingUrlMonitoring::where('url_custom', 'like', '%' . $random . '%')->first();
    if ($trap) {
        $trap->count_access += 1;
        $trap->save();
        return redirect()->to($trap->url_source . '/' . $random); // Redirect ke URL asli
    }
    return abort(404); // Jika tidak ditemukan, tampilkan halaman 404
});

Route::get('/inserting-form-trap/{random}', function ($random) {
    $trap = TrapingUrlMonitoring::where('url_custom', 'like', '%' . $random . '%')->first();
    if ($trap) {
        $trap->count_form_access += 1;
        $trap->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
});

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Http;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test-tinyurl', function () {
    $longUrl = 'http://localhost:8000/trap/ti1k1teeazpc8krxr4wkcv';
    $response = Http::get("https://tinyurl.com/api-create.php", [
        'url' => $longUrl
    ]);

    if ($response->successful()) {
        return $response->body(); // Mengembalikan URL pendek
    }

    return null; // Jika gagal
});

Route::get('/generate', [TrapingUrlMonitoringController::class, 'generateShortURLAPI']);