<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->input('search');

    $items = \App\Models\Item::query()
        ->when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', "%{$search}%")
                         ->orWhere('kod_barang', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('items.index', compact('items', 'search'));
    }

    public function create()
    {
        // Logic to show the form for creating a new item
        return view('items.create');
    }

    public function store(Request $request) 
    {
        // Logic to store a new item in the database
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kod_barang' => 'required|string|unique:items,kod_barang',
            'kuantiti' => 'required|integer|min:0',
            'lokasi_simpanan' => 'required|string|max:255',
            'paras_minimum' => 'nullable|integer|min:0',
            'catatan' => 'nullable|string',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item berjaya ditambah!.');
    }

    public function edit(Item $item)
    {
        // Logic to show the form for editing an existing item
        return view('items.edit', compact('item'));
    }
    public function update(Request $request, Item $item)
    {
        // Logic to update an existing item in the database
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kod_barang' => 'required|string|unique:items,kod_barang,' . $item->id,
            'kuantiti' => 'required|integer|min:0',
            'lokasi_simpanan' => 'required|string|max:255',
            'paras_minimum' => 'nullable|integer|min:0',
            'catatan' => 'nullable|string',
        ]);
        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item berjaya dikemaskini!.');
    }

    public function destroy(Item $item)
    {
        // Logic to delete an existing item from the database
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berjaya dipadam!.');
    }
}
