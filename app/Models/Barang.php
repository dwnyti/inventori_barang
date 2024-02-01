<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function peminjaman_barang(){
        return $this->hasMany(PeminjamanBarang::class);
    }
}
