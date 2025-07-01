<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PergerakanController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;

Route::get('/', function () {
    return view('welcome');
});

// Semua route dilindungi login
Route::middleware(['auth'])->group(function () {

    // Dashboard dengan statistik
    Route::get('/dashboard', function () {
        $total = Item::count();
        $stok_rendah = Item::whereColumn('kuantiti', '<=', 'paras_minimum')->count();
        $stok_ok = $total - $stok_rendah;

        $items = Item::select('nama_barang', 'kuantiti')->get();
        $labels = $items->pluck('nama_barang');
        $data = $items->pluck('kuantiti');

        // Top 5 stok rendah
        $top5 = Item::orderBy('kuantiti', 'asc')->take(5)->get();

        return view('dashboard.index', compact('total', 'stok_rendah', 'stok_ok', 'labels', 'data', 'top5'));
    })->name('dashboard');

    // Modul Stok Barang
    Route::resource('items', ItemController::class);

    // Modul Pergerakan Barang
    Route::resource('pergerakan', PergerakanController::class);
    Route::get('/statistik/pergerakan', [PergerakanController::class, 'statistik'])->name('pergerakan.statistik');

    // Export Excel & PDF
    Route::get('/export-excel', [ExportController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export-pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');

    // Profile (default dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route login/register/reset (default Breeze)
require __DIR__.'/auth.php';
