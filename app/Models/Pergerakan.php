<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergerakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'jenis',
        'kuantiti',
        'catatan',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
