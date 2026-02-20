<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Magang;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTE PUBLIC ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');


// --- GROUP ROUTE SETELAH LOGIN ---
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. AREA ADMIN
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/pendaftar/{id}', [AdminController::class, 'show'])->name('admin.show');
        Route::patch('/magang/{id}/approve', [AdminController::class, 'approve'])->name('magang.approve');
        Route::patch('/magang/{id}/reject', [AdminController::class, 'reject'])->name('magang.reject');
        Route::patch('/admin/magang/{id}/{status}', [AdminController::class, 'updateStatus'])->name('admin.status.update');
        Route::get('/admin/monitoring', [AdminController::class, 'monitoring'])->name('admin.monitoring');
        Route::get('/admin/monitoring/{id}', [AdminController::class, 'detailMahasiswa'])->name('admin.monitoring.detail');
        Route::patch('/admin/mingguan/{id}/approve', [AdminController::class, 'approveMingguan'])->name('admin.mingguan.approve');
        Route::patch('/admin/mingguan/{id}/reject', [AdminController::class, 'rejectMingguan'])->name('admin.mingguan.reject');
    });

    // 2. AREA MAHASISWA
    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('/dashboard', function () {
            $magang = Magang::where('user_id', Auth::id())->first();
            return view('dashboard', compact('magang'));
        })->name('dashboard');

        Route::get('/daftar-magang', [MagangController::class, 'create'])->name('magang.create');
        Route::post('/daftar-magang', [MagangController::class, 'store'])->name('magang.store');
        Route::resource('logbook', LogbookController::class);
        Route::get('/absensi', [PresenceController::class, 'index'])->name('presence.index');
        Route::post('/absensi/masuk', [PresenceController::class, 'checkIn'])->name('presence.checkin');
        Route::patch('/absensi/keluar', [PresenceController::class, 'checkOut'])->name('presence.checkout');
        Route::get('/laporan-mingguan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('/laporan-mingguan', [LaporanController::class, 'upload'])->name('laporan.upload');
        Route::get('/laporan/cetak', [LaporanController::class, 'downloadPdf'])->name('laporan.cetak');
    });

    // PENGATURAN PROFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// ==========================================
// RUTE PENYELAMAT (AKSES FILE PDF & FOTO)
// ==========================================
// Jalur ini akan mengambil file dari htdocs/storage/app/public/
Route::get('/arsip/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);

    if (!File::exists($filePath)) {
        return response()->json([
            'status' => 'ERROR',
            'pesan' => 'File Kagak Ada Bang!',
            'lokasi_yang_dicari' => $filePath
        ], 404);
    }

    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    $mimeType = File::mimeType($filePath);
    
    $headers = [
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline'
    ];

    return Response::file($filePath, $headers);
})->where('path', '(.*)');

require __DIR__.'/auth.php';

Route::get('/logo-utama', function () {
    $path = public_path('logo-simang.png');
    if (!file_exists($path)) abort(404);
    return response()->file($path);
})->name('logo.simang');