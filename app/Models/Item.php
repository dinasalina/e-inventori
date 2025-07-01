<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nama_barang',
        'kod_barang',
        'kuantiti',
        'lokasi_simpanan',
        'paras_minimum',
        'catatan',
    ];

    // Define any relationships if necessary
    // For example, if you have a User model and each item belongs to a user:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
