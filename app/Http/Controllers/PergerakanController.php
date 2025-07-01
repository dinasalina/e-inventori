<?php

namespace App\Http\Controllers; // ✅ TAMBAH BARIS INI

use App\Models\Pergerakan;
use App\Models\Item;
use Illuminate\Http\Request;

class PergerakanController extends Controller
{
    public function index(Request $request)
    {
    $query = \App\Models\Pergerakan::with('item')->latest();

    if ($request->filled('jenis')) {
        $query->where('jenis', $request->jenis);
    }

    if ($request->filled('barang')) {
        $query->whereHas('item', function ($q) use ($request) {
            $q->where('nama_barang', 'like', '%' . $request->barang . '%');
        });
    }

    if ($request->filled('catatan')) {
        $query->where('catatan', 'like', '%' . $request->catatan . '%');
    }

    if ($request->filled('tarikh')) {
        $query->whereDate('created_at', $request->tarikh);
    }

    $pergerakan = $query->get();

    return view('pergerakan.index', compact('pergerakan'));
    }

    public function create()
    {
    $items = Item::all();
    return view('pergerakan.create', compact('items'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'jenis' => 'required|in:masuk,keluar',
            'kuantiti' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

       $pergerakan = Pergerakan::create($request->only(['item_id', 'jenis', 'kuantiti', 'catatan']));


        // Kemaskini kuantiti barang
        $item = Item::find($request->item_id);
        if ($request->jenis === 'masuk') {
            $item->kuantiti += $request->kuantiti;
        } else {
            $item->kuantiti -= $request->kuantiti;
        }
        $item->save();

        return redirect()->route('pergerakan.index')->with('success', 'Pergerakan berjaya direkod.');
    }

    public function statistik()
    {
    // Kumpul data ikut tarikh dan jenis
    $masuk = \App\Models\Pergerakan::selectRaw('DATE(created_at) as tarikh, SUM(kuantiti) as jumlah')
        ->where('jenis', 'masuk')
        ->groupBy('tarikh')
        ->orderBy('tarikh')
        ->get();

    $keluar = \App\Models\Pergerakan::selectRaw('DATE(created_at) as tarikh, SUM(kuantiti) as jumlah')
        ->where('jenis', 'keluar')
        ->groupBy('tarikh')
        ->orderBy('tarikh')
        ->get();

    // Sediakan tarikh unik
    $labels = $masuk->pluck('tarikh')->merge($keluar->pluck('tarikh'))->unique()->sort()->values();

    // Padankan data mengikut tarikh
    $dataMasuk = $labels->map(fn($tarikh) => $masuk->firstWhere('tarikh', $tarikh)->jumlah ?? 0);
    $dataKeluar = $labels->map(fn($tarikh) => $keluar->firstWhere('tarikh', $tarikh)->jumlah ?? 0);

    return view('pergerakan.statistik', [
        'labels' => $labels,
        'dataMasuk' => $dataMasuk,
        'dataKeluar' => $dataKeluar,
    ]);
    }

}
