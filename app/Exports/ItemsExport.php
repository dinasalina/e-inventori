<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Item::select('kod_barang', 'nama_barang', 'kuantiti', 'paras_minimum')->get();
    }

    public function headings(): array
    {
        return ['Kod Barang', 'Nama Barang', 'Kuantiti', 'Paras Minimum'];
    }
}

