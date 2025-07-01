<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemsExport;
use PDF;

class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ItemsExport, 'senarai_barang.xlsx');
    }

    public function exportPDF()
    {
        $items = Item::all();
        $pdf = PDF::loadView('exports.barang_pdf', compact('items'));
        return $pdf->download('senarai_barang.pdf');
    }
}

