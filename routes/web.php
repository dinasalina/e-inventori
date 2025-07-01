<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/stok', function () {
//     return view('items.index');
// })->name('items.index');

Route::resource('items',ItemController::class);

Route::get('/dashboard', function () {
    $total = Item::count();
    $stok_rendah = Item::whereColumn('kuantiti', '<=', 'paras_minimum')->count();
    $stok_ok = $total - $stok_rendah;

    $items = Item::select('nama_barang', 'kuantiti')->get();
    $labels = $items->pluck('nama_barang');
    $data = $items->pluck('kuantiti');

    // 🔴 Dapatkan top 5 barang stok paling rendah
    $top5 = Item::orderBy('kuantiti', 'asc')->take(5)->get();

    return view('dashboard.index', compact('total', 'stok_rendah', 'stok_ok', 'labels', 'data', 'top5'));
})->name('dashboard');

Route::get('/export-excel', [ExportController::class, 'exportExcel'])->name('export.excel');
Route::get('/export-pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');